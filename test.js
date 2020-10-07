f = new Date("2020-09-29");
t = new Date();

f.setMonth(f.getMonth()+1)
t.setMonth(t.getMonth()+1)

const fetch = require('node-fetch');

let settings = { method: "Get" };

const https = require('https');

while (f <= t) {

    fixday = ('0' + f.getDate()).slice(-2)
    fixmonth = ('0' + f.getMonth()).slice(-2)
    veryear = f.getFullYear()+543

    url = "https://lottsanook.herokuapp.com/?date="+fixday+fixmonth+veryear

    fetch(url, settings)
    .then(res => res.json())
    .then((json) => {
        if(json[0][1] != 0){
            console.log(json[0][1])
            console.log(url)
        }

    });

    f.setDate(f.getDate() + 1)

}
