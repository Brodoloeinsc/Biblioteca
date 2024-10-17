const express = require('express');
const user = require('./src/controllers/user');

const app = express();

app.use(
    express.urlencoded({
        extended: true
    })
)
app.use(express.json())

app.use('/user', user)

app.listen(8080, ()=>{
    console.log("Rodando na porta 8080")
});