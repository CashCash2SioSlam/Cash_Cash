import express from 'express';
import bodyParser from 'body-parser';
import mariadb from 'mariadb';
import cors from 'cors';

const app = express();
app.use(bodyParser.json());

app.use(cors());

app.use(cors({
  origin: 'http://localhost:8080', // Autoriser uniquement les requêtes depuis cette origine
  optionsSuccessStatus: 200, // Certains navigateurs peuvent exiger cela pour les requêtes CORS
}));

const pool = mariadb.createPool({
  host: 'localhost',
  port: 3306,
  user: 'root',
  password: 'root',
  database: 'cash_cash',
  connectionLimit: 10,
});

app.get('/client', async (req, res) => {
  try {
    const connection = await pool.getConnection();
    const rows = await connection.query('SELECT NuméroClient,NomClient, Email, TelClient FROM client'); // Remplacez "votre_table" par le nom de votre table
    res.json(rows); // Vous pouvez personnaliser la réponse en fonction de vos besoins
  } catch (error) {
    console.error('Error connecting to database: ', error);
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

app.get('/client', async (req, res) => {
  try {
    const connection = await pool.getConnection();
    const rows = await connection.query('SELECT NuméroClient,NomClient, Email, TelClient FROM client'); // Remplacez "votre_table" par le nom de votre table
    res.json(rows); // Vous pouvez personnaliser la réponse en fonction de vos besoins
  } catch (error) {
    console.error('Error connecting to database: ', error);
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

app.get('/client/:numeroClient', async (req, res) => {
  try {
    const connection = await pool.getConnection();
    const numeroClient = req.params.numeroClient;
    const [rows] = await connection.query('SELECT * FROM client WHERE NuméroClient = ?', [numeroClient]);
    if (!rows || !rows.length) {
      return res.status(404).json({ error: 'Client not found' });
    }
    res.json(rows[0]);
  } catch (error) {
    console.error('Error connecting to database: ', error);
    res.status(500).json({ error: 'Internal Server Error' });
  }
});


app.get('/intervention', async (req, res) => {
  try {
    const connection = await pool.getConnection();
    const rows = await connection.query('SELECT * FROM intervention;'); // Remplacez "votre_table" par le nom de votre table
    res.json(rows); // Vous pouvez personnaliser la réponse en fonction de vos besoins
  } catch (error) {
    console.error('Error connecting to database: ', error);
    res.status(500).json({ error: 'Internal Server Error' });
  }
});

app.get('/technicien', async (req, res) => {
  try {
    const connection = await pool.getConnection();
    const rows = await connection.query('SELECT * FROM technicien;'); // Remplacez "votre_table" par le nom de votre table
    res.json(rows); // Vous pouvez personnaliser la réponse en fonction de vos besoins
  } catch (error) {
    console.error('Error connecting to database: ', error);
    res.status(500).json({ error: 'Internal Server Error' });
  }
});



const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});