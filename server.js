var express = require('express');
var pug = require('pug');
var fs = require('fs');
var moment = require('moment');
var Promise = require('bluebird');
Promise.promisifyAll(fs);
var path = require('path');
var app = express();

function getBlogDateFromLocation(loc){
    var temp = loc.split('/');
    var dateObj = new Date();
    dateObj.setYear(temp[temp.length-4]);
    dateObj.setUTCMonth(temp[temp.length-3]);
    dateObj.setDate(temp[temp.length-2]);
    return moment(dateObj);
}

function getSummary(body){
    var potential = body.split('\n')[0];

    if(potential.length > 25){
        return potential;
    } else{
        return body.split('\n')[2];
    }
}

// app.set('views', path.join(__dirname, '/server/templates'));
// app.set('view engine', 'pug');

app.get('/controller/getPost', function(req, res){
    var dir = __dirname + '/client/page/blog/'+encodeURI(req.query.loc);
    
    fs.readdirAsync(dir).then(function(files){
        if(files.length > 0 ){
            var loc = dir + '/' + files[0];
            return fs.readFileAsync(loc, {encoding: 'utf8'}).then(function(data){
                var date = getBlogDateFromLocation(loc).format("MMMM Do, YYYY");
                var title = files[0].replace(/_20/g, ' ').replace(/_/g, ' ').replace('.html', '');
                var content = data.replace(/\r/g, '').split('\n');

                res.send(pug.renderFile(__dirname+'/server/template/getPost.html', {date: date, title: title.replace(/_20/g, ' ').replace(/_/g, ' '), content: content}));
            });
        }else{
            res.json('couldnt find that dir or was empty!');
        }
    }).catch(function(err){
        res.json('error! ' + err);
    });
});

app.get('/controller/getPosts', function(req, res){
    // res.sendFile(__dirname+'/server/template/getPosts.html');
    var blogDir = __dirname + '/client/page/blog/';
    var blogs = [];

    fs.readdirAsync(blogDir).then(function(yearDirs){
        var yearPromises = [];

        yearDirs.forEach(function(yearDir, yearIndex){
            yearPromises.push(fs.readdirAsync(blogDir+yearDir+'/').then(function(monthDirs){
                var monthPromises = [];

                monthDirs.forEach(function(monthDir, monthIndex){
                    monthPromises.push(fs.readdirAsync(blogDir+yearDir+'/'+monthDir+'/').then(function(dayDirs){
                        var dayPromises = [];

                        dayDirs.forEach(function(dayDir, dayIndex){
                            dayPromises.push(fs.readdirAsync(blogDir+yearDir+'/'+monthDir+'/'+dayDir+'/').then(function(file){
                                return fs.readFileAsync(blogDir+yearDir+'/'+monthDir+'/'+dayDir+'/'+file[0], {encoding: 'utf8'}).then(function(finalFile){
                                    blogs.push({
                                        title: file[0].replace(/_20/g, ' ').replace(/_/g, ' ').replace('.html', '').replace(/3A/g, '-').replace(/ 2C/g, ','),
                                        date: getBlogDateFromLocation(blogDir+yearDir+'/'+monthDir+'/'+dayDir+'/'+file[0]),
                                        summary: getSummary(finalFile) + '...'
                                    });
                                });
                            }));
                        });

                        return Promise.all(dayPromises);
                    }));
                });

                return Promise.all(monthPromises);
            }));
        });

        return Promise.all(yearPromises);
    }).then(function(result){
        blogs = blogs.sort(function(a, b){
            if(a.date.valueOf() > b.date.valueOf()){
                return -1;
            } else {
                return 1;
            }
        });

        blogs.forEach(function(blog){
            blog.linkDate = blog.date.subtract(1, 'months').format("YYYY/M/D");
            blog.date = blog.date.format("MMMM Do, YYYY");
        });

        res.json({length: blogs.length, blogs: blogs});
    }).catch(function(err){
        res.json(err);
    });
});

var port = process.env.SERVER_PORT;
app.listen(port || 3000, function(){
    app.use(express.static(__dirname + '/client'));
    app.use(express.static(__dirname + '/client/projects'));

    console.log('The server is alive on port ', port || 3000);
});
