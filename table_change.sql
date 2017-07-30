ALTER TABLE `sessions`
DROP COLUMN `user_data`,
CHANGE COLUMN `session_id` `id`  varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' FIRST ,
MODIFY COLUMN `ip_address`  varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' AFTER `id`,
CHANGE COLUMN `user_agent` `timestamp`  int(10) UNSIGNED NOT NULL DEFAULT 0 AFTER `ip_address`,
CHANGE COLUMN `last_activity` `data`  blob NOT NULL AFTER `timestamp`,
DROP INDEX `last_activity_idx` ,
ADD INDEX `ci_sessions_timestamp` (`timestamp`) USING BTREE ;

