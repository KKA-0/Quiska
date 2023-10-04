const express = require('express')
const bodyParser = require('body-parser')
const Pool = require('pg').Pool
const app = express()
const port = 3000
const cors = require('cors')

app.use(cors({
    origin: '*'
}));

const pool = new Pool({
    user: 'quiska_posql_user',
    host: 'dpg-ck2sc3fqj8ts7388pheg-a.oregon-postgres.render.com',
    database: 'quiska_posql',
    password: 'gZ2SYbWVZXuLIfnzFsPeaGGMw4HDlyAh',
    port: 5432,
    ssl: { rejectUnauthorized: false },
  })


  const getQuizs = (request, response) => {
    pool.query('SELECT * FROM quiz_quiska', (error, results) => {
      if (error) {
        throw error
      }
      response.status(200).json(results.rows)
    })
  }
  const addQuiz = (request, response) => {
    console.log(request.body.ques)
    pool.query(``, (error, results) => {
      if (error) {
        throw error
      }
      response.status(200).json(results.rows)
    })
    response.status(200)
  }

app.use(bodyParser.json())
app.use(
  bodyParser.urlencoded({
    extended: true,
  })
)

app.get('/', getQuizs)
app.post('/add', addQuiz)

app.listen(port, () => {
    console.log(`App running on port ${port}.`)
  })