#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: categorie
#------------------------------------------------------------

CREATE TABLE categorie(
        id  Int  Auto_increment  NOT NULL ,
        nom Varchar (125) NOT NULL
	,CONSTRAINT categorie_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ticket
#------------------------------------------------------------

CREATE TABLE ticket(
        id                 Int NOT NULL ,
        id_categorie       Int NOT NULL ,
        id_response        Int NOT NULL ,
        email              Varchar (255) NOT NULL ,
        random_id          Int NOT NULL ,
        date               Date NOT NULL ,
        id_categorie_Avoir Int
	,CONSTRAINT ticket_PK PRIMARY KEY (id,id_categorie,id_response)

	,CONSTRAINT ticket_categorie_FK FOREIGN KEY (id_categorie_Avoir) REFERENCES categorie(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reponse
#------------------------------------------------------------

CREATE TABLE reponse(
        id                  Int  Auto_increment  NOT NULL ,
        message             Varchar (125) NOT NULL ,
        date                Date NOT NULL ,
        status              Varchar (125) NOT NULL ,
        id_ticket           Int NOT NULL ,
        id_categorie_ticket Int NOT NULL ,
        id_response_ticket  Int NOT NULL
	,CONSTRAINT reponse_PK PRIMARY KEY (id)

	,CONSTRAINT reponse_ticket_FK FOREIGN KEY (id_ticket,id_categorie_ticket,id_response_ticket) REFERENCES ticket(id,id_categorie,id_response)
)ENGINE=InnoDB;

