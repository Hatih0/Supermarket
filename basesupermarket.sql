CREATE TABLE produit (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    price REAL,
    quantite_en_stock REAL 
    designation TEXT,
);

CREATE TABLE caisse (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    libelle TEXT
);

CREATE TABLE achat_fille (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_achat_mere INTEGER,
    id_produit INTEGER,
    quantite REAL
);

CREATE TABLE achat_mere (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_client INTEGER,
    id_caisse INTEGER
);