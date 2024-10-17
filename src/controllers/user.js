const { Router } = require('express')
const user = require('../db/user')

const app = Router()

app.get('/', async (req, res) => {
    var users = await user.getUsers()

    res.send(users)
})

app.get('/one/:cpf', async (req, res) => {
    var users = await user.getUser(req.params.cpf)

    res.send(users)
})

app.post('/', async (req, res)=>{
    let create = await user.createUser(req.body)

    res.send(create)
})

module.exports = app