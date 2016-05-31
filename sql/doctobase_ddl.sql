DROP DATABASE doctobase;
CREATE DATABASE doctobase;

use doctobase;
/*\c doc*/

CREATE TABLE drug
(
	class varchar(50),
	drug_name varchar(50),
	dosage varchar(50),
	PRIMARY KEY (drug_name)
);

CREATE TABLE cures
(
	drug_name varchar(50),
	symptom varchar(50),
	PRIMARY KEY(drug_name, symptom),
	FOREIGN KEY (drug_name) REFERENCES drug(drug_name)
);
/*
CREATE TABLE side_effects
(
	drug_name varchar(50),
	side_effect varchar(50),
	PRIMARY KEY (drug_name, side_effect),
	FOREIGN KEY (drug_name) REFERENCES drug
);
*/
CREATE TABLE medicine
(
	drug_name varchar(50),
	form varchar(50),
	brand_name varchar(50),
	manufacturer varchar(50),
	packing integer,
	cost numeric(8,2) check (cost>0),		/* in rupees */
	PRIMARY KEY (form,brand_name),
	FOREIGN KEY (drug_name) REFERENCES drug(drug_name)
);

CREATE TABLE store
(
	store_id varchar(50),
	dealer varchar(50),
	street varchar(50),
	area varchar(50),
	city varchar(50),
	phone_number numeric(10),
	pharmacy_chain varchar(50),
	PRIMARY KEY (store_id)
);

CREATE TABLE specialist
(
	specialist_id varchar(50),
	name varchar(50),
	start_time numeric(4,2) check( start_time*100>=0 and start_time*100<2400 and (start_time*100)%100>=0 and (start_time*100)%100<60 ),
	end_time numeric(4,2) check( end_time*100>=0 and end_time*100<2400 and (end_time*100)%100>=0 and (end_time*100)%100<60 ),
	email_id varchar(50),
	phone_number numeric(10),
	hospital varchar(50),
	PRIMARY KEY (specialist_id)
);

CREATE TABLE treats
(
	specialist_id varchar(50),
	symptom varchar(50),
	FOREIGN KEY (specialist_id) REFERENCES specialist(specialist_id),
	PRIMARY KEY (specialist_id, symptom)
);

CREATE TABLE sells
(
	store_id varchar(50),
	brand_name varchar(50),
	form varchar(50),
	manf_date date,
	exp_date date,
	quantity integer,
	cost numeric(8,2) check (cost>0),
	PRIMARY KEY (store_id, form, brand_name),
	FOREIGN KEY (store_id) REFERENCES store(store_id),
	FOREIGN KEY (form,brand_name) REFERENCES medicine(form,brand_name)
);
	
