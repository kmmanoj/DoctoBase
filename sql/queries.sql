/* to list singular details of the medicine*/
select drug_name, manufacturer from medicine where brand_name="";
/* to list general details of the medicine*/
select class, dosage from drug where drug_name=(select drug_name from medicine where brand_name="");
/* to list form details of the medicine*/
select f.form, m.packing, m.cost from (select distinct form from medicine) f left join (select * from medicine where brand_name="") m on f.form=m.form;
/* to list symptoms cured by the medicine*/
select symptom from cures where drug_name in (select drug_name from drug where drug_name in (select drug_name from medicine where brand_name=""));
/* to list specialist capable of dealing with all these symptoms*/
select distinct specialist_id from treats where specialist_id not in (select distinct s.specialist_id from (select s.specialist_id from treats s, (select symptom from cures where drug_name in (select drug_name from drug where drug_name in (select drug_name from medicine where brand_name="")))l where s.symptom=l.symptom) s, (select symptom from cures where drug_name in (select drug_name from drug where drug_name in (select drug_name from medicine where brand_name=""))) l);
/* to list the rank of each specialist by the skills they posses*/
select name from specialist natural join (select count(symptom) count_of_symptoms,specialist_id from treats group by specialist_id order by count(symptom) desc) rank_specialist order by rank_specialist.count_of_symptoms desc;
/* to list working hours of specialist*/
select (24+end_time-start_time)%24 working_time, start_time, end_time from specialist;
/* given a symptom list the names of medicines*/
select distinct m.brand_name from medicine m, cures c where c.symptom="" and c.drug_name=m.drug_name;
/* finding the usage period of a medicine */
select avg(extract(year from exp_date)-extract(year from manf_date)) as "best before (in years)" from sells where brand_name="" and form="";
/* at a particular time list the specialist who are active */
select * from specialist where start_time-end_time>0 and (start_time<= or end_time>=) union select * from specialist where start_time-end_time<0 and (start_time<= and end_time>=);
/* list the stores that have all the medicines listed */
select avg(cost) from sells where store_id in (select store_id from store where city="") and brand_name="" and form="";
/* insert medicines into sells */
insert into sells values(store_id,<medicine>,<form>,manf_date,exp_date,quantity,<cost>);
/* delete medicines from sells */
select * from sells where extract(year from exp_date)<;
delete from sells where extract(year from exp_date)<;
/* update queries */
update table medicine set quantity=quantity- where brand_name="" and form="";
/* possible selling prices of medicine at a particular place*/
select avg(cost) avg_cost from sells where store_id in (select store_id from store where city="") and brand_name="" and form="";
select avg(cost) avg_cost from sells where store_id in (select store_id from store where pharmacy_chain="") and brand_name="" and form="";
/* brand names of all other medicine under same drug*/
select brand_name from medicine where drug_name=(select drug_name from medicine where brand_name="");
/* drug_name of drugs which came under the same class as the input drug */
select drug_name from drug where class=(select class from drug where drug_name="");
/* in the beginning of the transaction */
create temporary table transaction(brand_name varchar(50) not null, form varchar(50) not null, quantity int unsigned,cost int unsigned);
insert into transaction values("","",0,0);
update transaction set quantity=quantity+<addon> where brand_name="" and form="";
update transaction set cost=cost+<addon>*<basic> where brand_name="" and form="";

