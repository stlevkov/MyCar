USE blog;

INSERT INTO users (username, password_hash, full_name) VALUES ('admin', '$2y$10$IKZilzblrGgRM7KjsN99q.mHvQ321GZx2OI57Ccw4G5W1e0M77XdG', 'Administrator');

INSERT INTO users (username, password_hash, full_name) VALUES ('stlevkov', '$2y$10$aqsgT.qlXQDcjzCW1u7kXu0N67EXHkxvzA2cXUS8Oz53StuJTzvzm', 'Stoycho Levkov');


INSERT INTO posts (title, content, date, user_id) VALUES ('Version 1.7 Launched', '<p>The <b>My Car Reminder is using php Version 7.08 and Apache server (based on XAMPP)</b> Launched on english for now and only displaying data status of the car parts.</p>

<p>For now people can register and login and also:</p>
<ul>
  <li>Create new replacement part</li>
  <li>List replacement part with status bars</li>
  <li>Replace and archive for compare parts</li>
  <li>Edit or Delete their parts status</li>
</ul>
<p>The program is in developing mode so you can send your opinions on my personal e-mail: stlevkov@gmail.com </p>
', '2016-09-08 14:25:40', 2);




INSERT INTO parts (part_name, description, date, car_kilometers, part_life, service_name, archive, part_price, user_id) VALUES ('Накладки', 'PRO USER STOP WHEELS', '2016-05-22 11:57:40',183000, 40000, 'Peugeot official service Liulin Sofia','No', 40, 2);
INSERT INTO parts (part_name, description, date, car_kilometers, part_life, service_name, archive,part_price, user_id) VALUES ('Ангренажен Ремък + Ролки', 'Angrena-Ts pro 2016 ot Pro-service-Sofia', '2016-11-22 11:57:40', 183000, 50000, 'Mobile auto Zapaden park Sofia','No',50, 2);
INSERT INTO parts(part_name,description,date,car_kilometers,part_life,service_name, archive,part_price, user_id) VALUES ('Въздушен филтър','Кей Енд Макс (K&Max)', '2016-05-31 10:10:10', 183000, 10000, 'PEUGEOT Service BG TUNE - София', 'No', 22, 2 );
INSERT INTO parts (part_name, description, date, car_kilometers, part_life, service_name, archive,part_price, user_id) VALUES ('Масло Двигател', 'EKO DIESEL ENGINE OIL from Gencho', '2016-05-22 11:57:40', 183000, 10000, 'CAR-PRO-SOFIA', 'No',90, 2);
INSERT INTO parts (part_name, description, date, car_kilometers, part_life, service_name, archive,part_price, user_id) VALUES ('Филтър на Купето', 'Filters and Air Dynamics - PLOVDIV ', '2016-05-22 11:57:40', 183000, 15000, 'CAR-PRO-SOFIA', 'No', 25,2);
INSERT INTO parts (part_name, description, date, car_kilometers, part_life, service_name, archive,part_price, user_id) VALUES ('Горивен филтър', 'Filters and Air Dynamics - PLOVDIV ', '2016-05-22 11:57:40', 183000, 15000, 'Peugeot Service BG TUNE - София', 'No',30, 2);
INSERT INTO parts (part_name, description, date, car_kilometers, part_life, service_name, archive,part_price, user_id) VALUES ('ФРЕОН на климатика', '3 liters ', '2016-07-22 11:57:40', 184000, 30000, 'Люлин София - 6+ , сервиз Шест6+ ', 'No',50, 2);
