CREATE TABLE user (id BIGINT AUTO_INCREMENT, handle VARCHAR(200), country VARCHAR(200), fb VARCHAR(100), tc BIGINT, tc_handle VARCHAR(200), tc_rating BIGINT, votes BIGINT, voted VARCHAR(200), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE rank (user_id BIGINT, competition_id BIGINT, rank BIGINT, points BIGINT, PRIMARY KEY(user_id, competition_id)) ENGINE = INNODB;
CREATE TABLE competition (id BIGINT AUTO_INCREMENT, name VARCHAR(200), questions BIGINT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE score (user_id BIGINT, competition_id BIGINT, question BIGINT, time BIGINT, tries BIGINT, lang VARCHAR(20), PRIMARY KEY(user_id, competition_id, question)) ENGINE = INNODB;
ALTER TABLE rank ADD FOREIGN KEY (user_id) REFERENCES user(id);
ALTER TABLE rank ADD FOREIGN KEY (competition_id) REFERENCES competition(id);
ALTER TABLE score ADD FOREIGN KEY (user_id) REFERENCES user(id);
ALTER TABLE score ADD FOREIGN KEY (competition_id) REFERENCES competition(id);
