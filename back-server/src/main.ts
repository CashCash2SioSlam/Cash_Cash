import express from 'express';
import mariadb from 'mariadb';
import bodyParser from "body-parser";

const app = express();
app.use(bodyParser.json());


const pool = mariadb.createPool({
    host: 'localhost',
    port: 3306,
    user: 'root',
    password: 'root',
    database: 'test',
    connectionLimit: 5,
  });
  
  const PORT = process.env.PORT || 3000;
  app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
  });
  

