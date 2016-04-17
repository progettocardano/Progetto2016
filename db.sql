CREATE TABLE Docenti
(
    docente_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome varchar(64) NOT NULL,
    cognome varchar(64) NOT NULL,
    materia varchar(16),
    data_nascita DATE
);
CREATE TABLE Studenti
(
    matricola INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome varchar(64) NOT NULL,
    cognome varchar(64) NOT NULL,
    codice_fiscale varchar(16) NOT NULL,
    data_nascita DATE NOT NULL,
    anno_prima_iscrizione YEAR,
    --rimosso. "Non ha senso" cit. Paolo Di Ciaula
    --anno_diploma YEAR,
    email varchar(128),
    telefono_fisso varchar(32),
    telefono_cellulare varchar(32),
    indirizzo_residenza varchar(32),
    comune_residenza varchar(32),
    docente_id INTEGER,
    FOREIGN KEY docente_id REFERENCES Docenti(docente_id)
);
CREATE TABLE Attivita
(
    attivita_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    tipo_attivita varchar(32) NOT NULL,
    descrizione TEXT,
    data_inizio DATE,
    data_fine DATE,
    numero_ore INTEGER,
    docente_id INTEGER,
    FOREIGN KEY docente_id REFERENCES Docenti(docente_id)
);