SHOW DATABASES ;

CREATE DATABASE DataLemur_sqlHistogramTweets;

USE DataLemur_sqlHistogramTweets;

SHOW TABLES;

CREATE TABLE tweets  (
    tweet_id INTEGER,
    user_id INTEGER,
    msg VARCHAR(50),
    tweet_date DATETIME
);

INSERT INTO tweets (tweet_id, user_id, msg, tweet_date) VALUES (214252, 111, "Am considering taking Tesla private at $420. Funding secured.", "2021-12-30 00:00:00");
INSERT INTO tweets (tweet_id, user_id, msg, tweet_date) VALUES (739252, 111, "Despite the constant negative press covfefe", "2022-01-01 00:00:00");
INSERT INTO tweets (tweet_id, user_id, msg, tweet_date) VALUES (846402, 111, "Following @NickSinghTech on Twitter changed my life!", "2022-02-14 00:00:00");
INSERT INTO tweets (tweet_id, user_id, msg, tweet_date) VALUES (241425, 254, "If the salary is so competitive why won’t you tell me what it is?", "2022-03-01 00:00:00");
INSERT INTO tweets (tweet_id, user_id, msg, tweet_date) VALUES (231574, 148, "I no longer have a manager. I can't be managed", "2022-03-23 00:00:00");

DELETE FROM tweets WHERE 1=1;
SELECT * FROM tweets;

SELECT 
    user_id,
    COUNT(tweet_id) AS tweets_count_per_user
FROM tweets
WHERE tweet_date BETWEEN "2022-01-01 00:00:00" 
    AND "2022-12-31 23:59:59"
GROUP BY user_id ;



SELECT 
    tweets_count_per_user AS tweet_bucket,
    COUNT(user_id) AS users_num FROM (
        SELECT 
            user_id,
            COUNT(tweet_id) AS tweets_count_per_user
        FROM tweets
        WHERE tweet_date BETWEEN "2022-01-01 00:00:00" 
            AND "2022-12-31 23:59:59"
        GROUP BY user_id
    ) AS user_num
    GROUP BY tweets_count_per_user
;