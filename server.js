var express = require('express');
var pug = require('pug');
var fs = require('fs');
var moment = require('moment');
var path = require('path');
var app = express();

// app.set('views', path.join(__dirname, '/server/templates'));
// app.set('view engine', 'pug');

app.get('/controller/getNewsPost', function(req, res){
    res.sendFile(__dirname+'/server/template/getNewsPost.html');
});

app.get('/controller/getPost', function(req, res){
    var dir = __dirname + '/client/page/blog-posts/'+encodeURI(req.query.loc);
    
    fs.readdir(dir, function(err, files){
        if(!err && files.length > 0 ){
            var loc = dir + '/' + files[0];
            fs.readFile(loc, {encoding: 'utf8'}, function(err, data){
                if(!err){
                    var temp = loc.split('/');
                    var dateObj = new Date();
                    dateObj.setYear(temp[temp.length-4]);
                    dateObj.setUTCMonth(temp[temp.length-3]);
                    dateObj.setDate(temp[temp.length-2]);
                    var date = moment(dateObj).format("MMMM Do, YYYY");
                    var title = decodeURI(temp[temp.length-1].split('.')[0]);
                    var content = data.replace(/\r/g, '').split('\n');

                    res.send(pug.renderFile(__dirname+'/server/template/getPost.html', {date: date, title: title, content: content}));
                } else {
                    res.json('couldnt find that post!');
                }
            });
        }else{
            res.json('couldnt find that dir or was empty!');
        }
    });
});

app.get('/controller/getPosts', function(req, res){

    res.sendFile(__dirname+'/server/template/getPosts.html');
});

app.listen(3000, function(){
    app.use(express.static('client'));
    app.use(express.static('client/projects'));

    console.log('The server is alive on port 3000!');
});