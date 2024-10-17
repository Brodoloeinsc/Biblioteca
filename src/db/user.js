const {PrismaClient, Prisma} = require('@prisma/client')

const prisma = new PrismaClient()

module.exports.getUsers = async function(){
    const users = await prisma.user.findMany()

    return users
}

module.exports.getUser = async function(cpf){
    const users = await prisma.user.findUnique({
        where:{
            cpf: cpf
        }
    })

    return users
}

async function createUser(datas){
    const user = await prisma.user.create({
        data: {
            name: datas.name,
            address: datas.address,
            celphone: datas.cell,
            cpf: datas.cpf
        }
    })

    console.log(user)
    return user
}

module.exports.createUser = createUser