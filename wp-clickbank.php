<?php

/*
Plugin Name: Wordpress ClickBank Plugin
Plugin URI: http://wpcbplugin.com/
Description: This plugin shows relevant products and services from the ClickBank.com marketplace. You can targeted a specific niche. Link to targeted affiliate products &amp; services when creating or editing posts. Also includes widget for displaying ClickBank text ads. This is the free version of the plugin. Your affiliate ID will display 80% of the time. Remember to check out the <a target="_new" href="http://wpcbplugin.net/">Wordpress ClickBank Plugin PRO</a> version.
Version: 1.1.3
Author: <a href="http://makemoneyhelper.com/" target="new">Thomas Alling</a>
*/

include(dirname(__FILE__).'/wp-clickbank-widget.php');
class WpClickBank {
private $pluginDir;
private $pluginURL;
public $categories = array( array('id' => 1253, 'name' => 'Arts &amp; Entertainment'),
array('id' => 1510, 'name' => 'Betting'),
array('id' => 1266, 'name' => 'Business / Investing'),
array('id' => 1283, 'name' => 'Computers / Internet'),
array('id' => 1297, 'name' => 'Cooking, Food &amp; Wine'),
array('id' => 1308, 'name' => 'E-business &amp; E-marketing'),
array('id' => 1362, 'name' => 'Education'),
array('id' => 1332, 'name' => 'Employment &amp; Jobs'),
array('id' => 1338, 'name' => 'Fiction'),
array('id' => 1340, 'name' => 'Games'),
array('id' => 1344, 'name' => 'Green Products'),
array('id' => 1347, 'name' => 'Health &amp; Fitness'),
array('id' => 1366, 'name' => 'Home &amp; Garden'),
array('id' => 1377, 'name' => 'Languages'),
array('id' => 1392, 'name' => 'Mobile'),
array('id' => 1400, 'name' => 'Parenting &amp; Families'),
array('id' => 1408, 'name' => 'Politics / Current Events'),
array('id' => 1410, 'name' => 'Reference'),
array('id' => 1419, 'name' => 'Self-Help'),
array('id' => 1432, 'name' => 'Software &amp; Services'),
array('id' => 1461, 'name' => 'Spirituality, New Age &amp; Alternative Beliefs'),
array('id' => 1472, 'name' => 'Sports'),
array('id' => 1494, 'name' => 'Travel'));

public $subCategories = array(  array('id' => 1265, 'parent' => 1253, 'path' => 'Arts & Entertainment &raquo; Architecture', 'name' => 'Architecture'),
array('id' => 1259, 'parent' => 1253, 'path' => 'Arts & Entertainment &raquo; Art', 'name' => 'Art'),
array('id' => 1254, 'parent' => 1253, 'path' => 'Arts & Entertainment &raquo; Body Art', 'name' => 'Body Art'),
array('id' => 1261, 'parent' => 1253, 'path' => 'Arts & Entertainment &raquo; Dance', 'name' => 'Dance'),
array('id' => 1263, 'parent' => 1253, 'path' => 'Arts & Entertainment &raquo; Fashion', 'name' => 'Fashion'),
array('id' => 1255, 'parent' => 1253, 'path' => 'Arts & Entertainment &raquo; Film & Television', 'name' => 'Film &amp; Television'),
array('id' => 1260, 'parent' => 1253, 'path' => 'Arts & Entertainment &raquo; General', 'name' => 'General'),
array('id' => 1262, 'parent' => 1253, 'path' => 'Arts & Entertainment &raquo; Humor', 'name' => 'Humor'),
array('id' => 1519, 'parent' => 1253, 'path' => 'Arts & Entertainment &raquo; Magic Tricks', 'name' => 'Magic Tricks'),
array('id' => 1256, 'parent' => 1253, 'path' => 'Arts & Entertainment &raquo; Music', 'name' => 'Music'),
array('id' => 1257, 'parent' => 1253, 'path' => 'Arts & Entertainment &raquo; Photography', 'name' => 'Photography'),
array('id' => 1258, 'parent' => 1253, 'path' => 'Arts & Entertainment &raquo; Radio', 'name' => 'Radio'),
array('id' => 1264, 'parent' => 1253, 'path' => 'Arts & Entertainment &raquo; Theater', 'name' => 'Theater'),
array('id' => 1515, 'parent' => 1510, 'path' => 'Betting &raquo; Casino Table Games', 'name' => 'Casino Table Games'),
array('id' => 1517, 'parent' => 1510, 'path' => 'Betting &raquo; Football', 'name' => 'Football'),
array('id' => 1511, 'parent' => 1510, 'path' => 'Betting &raquo; General', 'name' => 'General'),
array('id' => 1512, 'parent' => 1510, 'path' => 'Betting &raquo; Horse Racing', 'name' => 'Horse Racing'),
array('id' => 1514, 'parent' => 1510, 'path' => 'Betting &raquo; Lottery', 'name' => 'Lottery'),
array('id' => 1513, 'parent' => 1510, 'path' => 'Betting &raquo; Poker', 'name' => 'Poker'),
array('id' => 1516, 'parent' => 1510, 'path' => 'Betting &raquo; Soccer', 'name' => 'Soccer'),
array('id' => 1275, 'parent' => 1266, 'path' => 'Business / Investing &raquo; Careers, Industries & Professions', 'name' => 'Careers, Industries &amp; Professions'),
array('id' => 1520, 'parent' => 1266, 'path' => 'Business / Investing &raquo; Commodities', 'name' => 'Commodities'),
array('id' => 1277, 'parent' => 1266, 'path' => 'Business / Investing &raquo; Debt', 'name' => 'Debt'),
array('id' => 1271, 'parent' => 1266, 'path' => 'Business / Investing &raquo; Derivatives', 'name' => 'Derivatives'),
array('id' => 1280, 'parent' => 1266, 'path' => 'Business / Investing &raquo; Economics', 'name' => 'Economics'),
array('id' => 1268, 'parent' => 1266, 'path' => 'Business / Investing &raquo; Equities & Stocks', 'name' => 'Equities &amp; Stocks'),
array('id' => 1267, 'parent' => 1266, 'path' => 'Business / Investing &raquo; Foreign Exchange', 'name' => 'Foreign Exchange'),
array('id' => 1270, 'parent' => 1266, 'path' => 'Business / Investing &raquo; General', 'name' => 'General'),
array('id' => 1276, 'parent' => 1266, 'path' => 'Business / Investing &raquo; International Business', 'name' => 'International Business'),
array('id' => 1278, 'parent' => 1266, 'path' => 'Business / Investing &raquo; Management & Leadership', 'name' => 'Management &amp; Leadership'),
array('id' => 1273, 'parent' => 1266, 'path' => 'Business / Investing &raquo; Marketing & Sales', 'name' => 'Marketing &amp; Sales'),
array('id' => 1279, 'parent' => 1266, 'path' => 'Business / Investing &raquo; Outsourcing', 'name' => 'Outsourcing'),
array('id' => 1274, 'parent' => 1266, 'path' => 'Business / Investing &raquo; Personal Finance', 'name' => 'Personal Finance'),
array('id' => 1269, 'parent' => 1266, 'path' => 'Business / Investing &raquo; Real Estate', 'name' => 'Real Estate'),
array('id' => 1272, 'parent' => 1266, 'path' => 'Business / Investing &raquo; Small Biz / Entrepreneurship', 'name' => 'Small Biz / Entrepreneurship'),
array('id' => 1290, 'parent' => 1283, 'path' => 'Computers / Internet &raquo; Databases', 'name' => 'Databases'),
array('id' => 1295, 'parent' => 1283, 'path' => 'Computers / Internet &raquo; Email Services', 'name' => 'Email Services'),
array('id' => 1292, 'parent' => 1283, 'path' => 'Computers / Internet &raquo; General', 'name' => 'General'),
array('id' => 1285, 'parent' => 1283, 'path' => 'Computers / Internet &raquo; Graphics', 'name' => 'Graphics'),
array('id' => 1288, 'parent' => 1283, 'path' => 'Computers / Internet &raquo; Hardware', 'name' => 'Hardware'),
array('id' => 1291, 'parent' => 1283, 'path' => 'Computers / Internet &raquo; Networking', 'name' => 'Networking'),
array('id' => 1293, 'parent' => 1283, 'path' => 'Computers / Internet &raquo; Operating Systems', 'name' => 'Operating Systems'),
array('id' => 1287, 'parent' => 1283, 'path' => 'Computers / Internet &raquo; Programming', 'name' => 'Programming'),
array('id' => 1286, 'parent' => 1283, 'path' => 'Computers / Internet &raquo; Software', 'name' => 'Software'),
array('id' => 1296, 'parent' => 1283, 'path' => 'Computers / Internet &raquo; System Administration', 'name' => 'System Administration'),
array('id' => 1294, 'parent' => 1283, 'path' => 'Computers / Internet &raquo; System Analysis & Design', 'name' => 'System Analysis &amp; Design'),
array('id' => 1289, 'parent' => 1283, 'path' => 'Computers / Internet &raquo; Web Hosting', 'name' => 'Web Hosting'),
array('id' => 1284, 'parent' => 1283, 'path' => 'Computers / Internet &raquo; Web Site Design', 'name' => 'Web Site Design'),
array('id' => 1300, 'parent' => 1297, 'path' => 'Cooking, Food & Wine &raquo; BBQ', 'name' => 'BBQ'),
array('id' => 1298, 'parent' => 1297, 'path' => 'Cooking, Food & Wine &raquo; Baking', 'name' => 'Baking'),
array('id' => 1303, 'parent' => 1297, 'path' => 'Cooking, Food & Wine &raquo; Cooking', 'name' => 'Cooking'),
array('id' => 1304, 'parent' => 1297, 'path' => 'Cooking, Food & Wine &raquo; Drinks & Beverages', 'name' => 'Drinks &amp; Beverages'),
array('id' => 1305, 'parent' => 1297, 'path' => 'Cooking, Food & Wine &raquo; General', 'name' => 'General'),
array('id' => 1299, 'parent' => 1297, 'path' => 'Cooking, Food & Wine &raquo; Recipes', 'name' => 'Recipes'),
array('id' => 1306, 'parent' => 1297, 'path' => 'Cooking, Food & Wine &raquo; Regional & Intl.', 'name' => 'Regional &amp; Intl.'),
array('id' => 1301, 'parent' => 1297, 'path' => 'Cooking, Food & Wine &raquo; Special Diet', 'name' => 'Special Diet'),
array('id' => 1302, 'parent' => 1297, 'path' => 'Cooking, Food & Wine &raquo; Special Occasions', 'name' => 'Special Occasions'),
array('id' => 1307, 'parent' => 1297, 'path' => 'Cooking, Food & Wine &raquo; Vegetables / Vegetarian', 'name' => 'Vegetables / Vegetarian'),
array('id' => 1521, 'parent' => 1297, 'path' => 'Cooking, Food & Wine &raquo; Wine Making', 'name' => 'Wine Making'),
array('id' => 1309, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Affiliate Marketing', 'name' => 'Affiliate Marketing'),
array('id' => 1311, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Article Marketing', 'name' => 'Article Marketing'),
array('id' => 1326, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Auctions', 'name' => 'Auctions'),
array('id' => 1330, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Banners', 'name' => 'Banners'),
array('id' => 1318, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Blog Marketing', 'name' => 'Blog Marketing'),
array('id' => 1323, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Classified Advertising', 'name' => 'Classified Advertising'),
array('id' => 1328, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Consulting', 'name' => 'Consulting'),
array('id' => 1327, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Copywriting', 'name' => 'Copywriting'),
array('id' => 1325, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Domains', 'name' => 'Domains'),
array('id' => 1312, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; E-commerce Operations', 'name' => 'E-commerce Operations'),
array('id' => 1320, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; E-zine Strategies', 'name' => 'E-zine Strategies'),
array('id' => 1321, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Email Marketing', 'name' => 'Email Marketing'),
array('id' => 1324, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; General', 'name' => 'General'),
array('id' => 1317, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Market Research', 'name' => 'Market Research'),
array('id' => 1319, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Marketing', 'name' => 'Marketing'),
array('id' => 1322, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Niche Marketing', 'name' => 'Niche Marketing'),
array('id' => 1314, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Paid Surveys', 'name' => 'Paid Surveys'),
array('id' => 1313, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Pay Per Click Advertising', 'name' => 'Pay Per Click Advertising'),
array('id' => 1310, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Promotion', 'name' => 'Promotion'),
array('id' => 1315, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; SEM & SEO', 'name' => 'SEM &amp; SEO'),
array('id' => 1331, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Social Media Marketing', 'name' => 'Social Media Marketing'),
array('id' => 1316, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Submitters', 'name' => 'Submitters'),
array('id' => 1329, 'parent' => 1308, 'path' => 'E-business & E-marketing &raquo; Video Marketing', 'name' => 'Video Marketing'),
array('id' => 1364, 'parent' => 1362, 'path' => 'Education &raquo; Admissions', 'name' => 'Admissions'),
array('id' => 1522, 'parent' => 1362, 'path' => 'Education &raquo; Educational Materials', 'name' => 'Educational Materials'),
array('id' => 1523, 'parent' => 1362, 'path' => 'Education &raquo; Higher Education', 'name' => 'Higher Education'),
array('id' => 1524, 'parent' => 1362, 'path' => 'Education &raquo; K-12', 'name' => 'K-12'),
array('id' => 1365, 'parent' => 1362, 'path' => 'Education &raquo; Student Loans', 'name' => 'Student Loans'),
array('id' => 1363, 'parent' => 1362, 'path' => 'Education &raquo; Test Prep & Study Guides', 'name' => 'Test Prep &amp; Study Guides'),
array('id' => 1335, 'parent' => 1332, 'path' => 'Employment & Jobs &raquo; Cover Letter & Resume Guides', 'name' => 'Cover Letter &amp; Resume Guides'),
array('id' => 1337, 'parent' => 1332, 'path' => 'Employment & Jobs &raquo; General', 'name' => 'General'),
array('id' => 1334, 'parent' => 1332, 'path' => 'Employment & Jobs &raquo; Job Listings', 'name' => 'Job Listings'),
array('id' => 1336, 'parent' => 1332, 'path' => 'Employment & Jobs &raquo; Job Search Guides', 'name' => 'Job Search Guides'),
array('id' => 1333, 'parent' => 1332, 'path' => 'Employment & Jobs &raquo; Job Skills / Training', 'name' => 'Job Skills / Training'),
array('id' => 1339, 'parent' => 1338, 'path' => 'Fiction &raquo; General', 'name' => 'General'),
array('id' => 1342, 'parent' => 1340, 'path' => 'Games &raquo; Console Guides & Repairs', 'name' => 'Console Guides &amp; Repairs'),
array('id' => 1343, 'parent' => 1340, 'path' => 'Games &raquo; General', 'name' => 'General'),
array('id' => 1341, 'parent' => 1340, 'path' => 'Games &raquo; Strategy Guides', 'name' => 'Strategy Guides'),
array('id' => 1345, 'parent' => 1344, 'path' => 'Green Products &raquo; Alternative Energy', 'name' => 'Alternative Energy'),
array('id' => 1346, 'parent' => 1344, 'path' => 'Green Products &raquo; Conservation & Efficiency', 'name' => 'Conservation &amp; Efficiency'),
array('id' => 1525, 'parent' => 1344, 'path' => 'Green Products &raquo; General', 'name' => 'General'),
array('id' => 1357, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; Addiction', 'name' => 'Addiction'),
array('id' => 1361, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; Beauty', 'name' => 'Beauty'),
array('id' => 1359, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; Dental Health', 'name' => 'Dental Health'),
array('id' => 1348, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; Diets & Weight Loss', 'name' => 'Diets &amp; Weight Loss'),
array('id' => 1354, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; Exercise & Fitness', 'name' => 'Exercise &amp; Fitness'),
array('id' => 1360, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; General', 'name' => 'General'),
array('id' => 1526, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; Meditation', 'name' => 'Meditation'),
array('id' => 1352, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; Men\'s Health', 'name' => 'Men&#039;s Health'),
array('id' => 1355, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; Mental Health', 'name' => 'Mental Health'),
array('id' => 1350, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; Nutrition', 'name' => 'Nutrition'),
array('id' => 1349, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; Remedies', 'name' => 'Remedies'),
array('id' => 1527, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; Sleep and Dreams', 'name' => 'Sleep and Dreams'),
array('id' => 1356, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; Spiritual Health', 'name' => 'Spiritual Health'),
array('id' => 1351, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; Strength Training', 'name' => 'Strength Training'),
array('id' => 1353, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; Women\'s Health', 'name' => 'Women&#039;s Health'),
array('id' => 1358, 'parent' => 1347, 'path' => 'Health & Fitness &raquo; Yoga', 'name' => 'Yoga'),
array('id' => 1368, 'parent' => 1366, 'path' => 'Home & Garden &raquo; Animal Care & Pets', 'name' => 'Animal Care &amp; Pets'),
array('id' => 1371, 'parent' => 1366, 'path' => 'Home & Garden &raquo; Crafts & Hobbies', 'name' => 'Crafts &amp; Hobbies'),
array('id' => 1374, 'parent' => 1366, 'path' => 'Home & Garden &raquo; Entertaining', 'name' => 'Entertaining'),
array('id' => 1367, 'parent' => 1366, 'path' => 'Home & Garden &raquo; Gardening & Horticulture', 'name' => 'Gardening &amp; Horticulture'),
array('id' => 1373, 'parent' => 1366, 'path' => 'Home & Garden &raquo; General', 'name' => 'General'),
array('id' => 1376, 'parent' => 1366, 'path' => 'Home & Garden &raquo; Homebuying', 'name' => 'Homebuying'),
array('id' => 1369, 'parent' => 1366, 'path' => 'Home & Garden &raquo; How-to & Home Improvements', 'name' => 'How-to &amp; Home Improvements'),
array('id' => 1375, 'parent' => 1366, 'path' => 'Home & Garden &raquo; Interior Design', 'name' => 'Interior Design'),
array('id' => 1372, 'parent' => 1366, 'path' => 'Home & Garden &raquo; Sewing', 'name' => 'Sewing'),
array('id' => 1370, 'parent' => 1366, 'path' => 'Home & Garden &raquo; Weddings', 'name' => 'Weddings'),
array('id' => 1391, 'parent' => 1377, 'path' => 'Languages &raquo; Arabic', 'name' => 'Arabic'),
array('id' => 1383, 'parent' => 1377, 'path' => 'Languages &raquo; Chinese', 'name' => 'Chinese'),
array('id' => 1385, 'parent' => 1377, 'path' => 'Languages &raquo; English', 'name' => 'English'),
array('id' => 1378, 'parent' => 1377, 'path' => 'Languages &raquo; French', 'name' => 'French'),
array('id' => 1381, 'parent' => 1377, 'path' => 'Languages &raquo; German', 'name' => 'German'),
array('id' => 1389, 'parent' => 1377, 'path' => 'Languages &raquo; Hebrew', 'name' => 'Hebrew'),
array('id' => 1390, 'parent' => 1377, 'path' => 'Languages &raquo; Hindi', 'name' => 'Hindi'),
array('id' => 1382, 'parent' => 1377, 'path' => 'Languages &raquo; Italian', 'name' => 'Italian'),
array('id' => 1380, 'parent' => 1377, 'path' => 'Languages &raquo; Japanese', 'name' => 'Japanese'),
array('id' => 1387, 'parent' => 1377, 'path' => 'Languages &raquo; Other', 'name' => 'Other'),
array('id' => 1386, 'parent' => 1377, 'path' => 'Languages &raquo; Russian', 'name' => 'Russian'),
array('id' => 1384, 'parent' => 1377, 'path' => 'Languages &raquo; Sign Language', 'name' => 'Sign Language'),
array('id' => 1379, 'parent' => 1377, 'path' => 'Languages &raquo; Spanish', 'name' => 'Spanish'),
array('id' => 1388, 'parent' => 1377, 'path' => 'Languages &raquo; Thai', 'name' => 'Thai'),
array('id' => 1518, 'parent' => 1392, 'path' => 'Mobile &raquo; Apps', 'name' => 'Apps'),
array('id' => 1397, 'parent' => 1392, 'path' => 'Mobile &raquo; Developer Tools', 'name' => 'Developer Tools'),
array('id' => 1395, 'parent' => 1392, 'path' => 'Mobile &raquo; General', 'name' => 'General'),
array('id' => 1393, 'parent' => 1392, 'path' => 'Mobile &raquo; Ringtones', 'name' => 'Ringtones'),
array('id' => 1396, 'parent' => 1392, 'path' => 'Mobile &raquo; Security', 'name' => 'Security'),
array('id' => 1394, 'parent' => 1392, 'path' => 'Mobile &raquo; Video', 'name' => 'Video'),
array('id' => 1528, 'parent' => 1400, 'path' => 'Parenting & Families &raquo; Divorce', 'name' => 'Divorce'),
array('id' => 1402, 'parent' => 1400, 'path' => 'Parenting & Families &raquo; Education', 'name' => 'Education'),
array('id' => 1405, 'parent' => 1400, 'path' => 'Parenting & Families &raquo; Genealogy', 'name' => 'Genealogy'),
array('id' => 1407, 'parent' => 1400, 'path' => 'Parenting & Families &raquo; General', 'name' => 'General'),
array('id' => 1406, 'parent' => 1400, 'path' => 'Parenting & Families &raquo; Marriage', 'name' => 'Marriage'),
array('id' => 1403, 'parent' => 1400, 'path' => 'Parenting & Families &raquo; Parenting', 'name' => 'Parenting'),
array('id' => 1401, 'parent' => 1400, 'path' => 'Parenting & Families &raquo; Pregnancy & Childbirth', 'name' => 'Pregnancy &amp; Childbirth'),
array('id' => 1404, 'parent' => 1400, 'path' => 'Parenting & Families &raquo; Special Needs', 'name' => 'Special Needs'),
array('id' => 1409, 'parent' => 1408, 'path' => 'Politics / Current Events &raquo; General', 'name' => 'General'),
array('id' => 1529, 'parent' => 1410, 'path' => 'Reference &raquo; Automotive', 'name' => 'Automotive'),
array('id' => 1412, 'parent' => 1410, 'path' => 'Reference &raquo; Catalogs & Directories', 'name' => 'Catalogs &amp; Directories'),
array('id' => 1411, 'parent' => 1410, 'path' => 'Reference &raquo; Consumer Guides', 'name' => 'Consumer Guides'),
array('id' => 1413, 'parent' => 1410, 'path' => 'Reference &raquo; Education', 'name' => 'Education'),
array('id' => 1418, 'parent' => 1410, 'path' => 'Reference &raquo; Etiquette', 'name' => 'Etiquette'),
array('id' => 1416, 'parent' => 1410, 'path' => 'Reference &raquo; Gay / Lesbian', 'name' => 'Gay / Lesbian'),
array('id' => 1417, 'parent' => 1410, 'path' => 'Reference &raquo; General', 'name' => 'General'),
array('id' => 1414, 'parent' => 1410, 'path' => 'Reference &raquo; Law & Legal Issues', 'name' => 'Law &amp; Legal Issues'),
array('id' => 1530, 'parent' => 1410, 'path' => 'Reference &raquo; The Sciences', 'name' => 'The Sciences'),
array('id' => 1415, 'parent' => 1410, 'path' => 'Reference &raquo; Writing', 'name' => 'Writing'),
array('id' => 1431, 'parent' => 1419, 'path' => 'Self-Help &raquo; Abuse', 'name' => 'Abuse'),
array('id' => 1423, 'parent' => 1419, 'path' => 'Self-Help &raquo; Dating Guides', 'name' => 'Dating Guides'),
array('id' => 1430, 'parent' => 1419, 'path' => 'Self-Help &raquo; Eating Disorders', 'name' => 'Eating Disorders'),
array('id' => 1427, 'parent' => 1419, 'path' => 'Self-Help &raquo; General', 'name' => 'General'),
array('id' => 1420, 'parent' => 1419, 'path' => 'Self-Help &raquo; Marriage & Relationships', 'name' => 'Marriage &amp; Relationships'),
array('id' => 1422, 'parent' => 1419, 'path' => 'Self-Help &raquo; Motivational / Transformational', 'name' => 'Motivational / Transformational'),
array('id' => 1426, 'parent' => 1419, 'path' => 'Self-Help &raquo; Personal Finance', 'name' => 'Personal Finance'),
array('id' => 1531, 'parent' => 1419, 'path' => 'Self-Help &raquo; Public Speaking', 'name' => 'Public Speaking'),
array('id' => 1532, 'parent' => 1419, 'path' => 'Self-Help &raquo; Self Defense', 'name' => 'Self Defense'),
array('id' => 1429, 'parent' => 1419, 'path' => 'Self-Help &raquo; Self-Esteem', 'name' => 'Self-Esteem'),
array('id' => 1421, 'parent' => 1419, 'path' => 'Self-Help &raquo; Stress Management', 'name' => 'Stress Management'),
array('id' => 1425, 'parent' => 1419, 'path' => 'Self-Help &raquo; Success', 'name' => 'Success'),
array('id' => 1428, 'parent' => 1419, 'path' => 'Self-Help &raquo; Time Management', 'name' => 'Time Management'),
array('id' => 1438, 'parent' => 1432, 'path' => 'Software & Services &raquo; Anti Adware / Spyware', 'name' => 'Anti Adware / Spyware'),
array('id' => 1436, 'parent' => 1432, 'path' => 'Software & Services &raquo; Background Investigations', 'name' => 'Background Investigations'),
array('id' => 1460, 'parent' => 1432, 'path' => 'Software & Services &raquo; Communications', 'name' => 'Communications'),
array('id' => 1441, 'parent' => 1432, 'path' => 'Software & Services &raquo; Dating', 'name' => 'Dating'),
array('id' => 1457, 'parent' => 1432, 'path' => 'Software & Services &raquo; Developer Tools', 'name' => 'Developer Tools'),
array('id' => 1456, 'parent' => 1432, 'path' => 'Software & Services &raquo; Digital Photos', 'name' => 'Digital Photos'),
array('id' => 1437, 'parent' => 1432, 'path' => 'Software & Services &raquo; Drivers', 'name' => 'Drivers'),
array('id' => 1453, 'parent' => 1432, 'path' => 'Software & Services &raquo; Education', 'name' => 'Education'),
array('id' => 1448, 'parent' => 1432, 'path' => 'Software & Services &raquo; Email', 'name' => 'Email'),
array('id' => 1433, 'parent' => 1432, 'path' => 'Software & Services &raquo; Foreign Exchange Investing', 'name' => 'Foreign Exchange Investing'),
array('id' => 1445, 'parent' => 1432, 'path' => 'Software & Services &raquo; General', 'name' => 'General'),
array('id' => 1452, 'parent' => 1432, 'path' => 'Software & Services &raquo; Graphic Design', 'name' => 'Graphic Design'),
array('id' => 1446, 'parent' => 1432, 'path' => 'Software & Services &raquo; Hosting', 'name' => 'Hosting'),
array('id' => 1444, 'parent' => 1432, 'path' => 'Software & Services &raquo; Internet Tools', 'name' => 'Internet Tools'),
array('id' => 1447, 'parent' => 1432, 'path' => 'Software & Services &raquo; MP3 & Audio', 'name' => 'MP3 &amp; Audio'),
array('id' => 1458, 'parent' => 1432, 'path' => 'Software & Services &raquo; Networking', 'name' => 'Networking'),
array('id' => 1455, 'parent' => 1432, 'path' => 'Software & Services &raquo; Operating Systems', 'name' => 'Operating Systems'),
array('id' => 1443, 'parent' => 1432, 'path' => 'Software & Services &raquo; Other Investment Software', 'name' => 'Other Investment Software'),
array('id' => 1459, 'parent' => 1432, 'path' => 'Software & Services &raquo; Personal Finance', 'name' => 'Personal Finance'),
array('id' => 1450, 'parent' => 1432, 'path' => 'Software & Services &raquo; Productivity', 'name' => 'Productivity'),
array('id' => 1434, 'parent' => 1432, 'path' => 'Software & Services &raquo; Registry Cleaners', 'name' => 'Registry Cleaners'),
array('id' => 1435, 'parent' => 1432, 'path' => 'Software & Services &raquo; Reverse Phone Lookup', 'name' => 'Reverse Phone Lookup'),
array('id' => 1454, 'parent' => 1432, 'path' => 'Software & Services &raquo; Screensavers & Wallpaper', 'name' => 'Screensavers &amp; Wallpaper'),
array('id' => 1439, 'parent' => 1432, 'path' => 'Software & Services &raquo; Security', 'name' => 'Security'),
array('id' => 1440, 'parent' => 1432, 'path' => 'Software & Services &raquo; System Optimization', 'name' => 'System Optimization'),
array('id' => 1449, 'parent' => 1432, 'path' => 'Software & Services &raquo; Utilities', 'name' => 'Utilities'),
array('id' => 1442, 'parent' => 1432, 'path' => 'Software & Services &raquo; Video', 'name' => 'Video'),
array('id' => 1451, 'parent' => 1432, 'path' => 'Software & Services &raquo; Web Design', 'name' => 'Web Design'),
array('id' => 1465, 'parent' => 1461, 'path' => 'Spirituality, New Age & Alternative Beliefs &raquo; Astrology', 'name' => 'Astrology'),
array('id' => 1470, 'parent' => 1461, 'path' => 'Spirituality, New Age & Alternative Beliefs &raquo; General', 'name' => 'General'),
array('id' => 1463, 'parent' => 1461, 'path' => 'Spirituality, New Age & Alternative Beliefs &raquo; Hypnosis', 'name' => 'Hypnosis'),
array('id' => 1466, 'parent' => 1461, 'path' => 'Spirituality, New Age & Alternative Beliefs &raquo; Magic', 'name' => 'Magic'),
array('id' => 1462, 'parent' => 1461, 'path' => 'Spirituality, New Age & Alternative Beliefs &raquo; Numerology', 'name' => 'Numerology'),
array('id' => 1468, 'parent' => 1461, 'path' => 'Spirituality, New Age & Alternative Beliefs &raquo; Paranormal', 'name' => 'Paranormal'),
array('id' => 1467, 'parent' => 1461, 'path' => 'Spirituality, New Age & Alternative Beliefs &raquo; Psychics', 'name' => 'Psychics'),
array('id' => 1469, 'parent' => 1461, 'path' => 'Spirituality, New Age & Alternative Beliefs &raquo; Religion', 'name' => 'Religion'),
array('id' => 1471, 'parent' => 1461, 'path' => 'Spirituality, New Age & Alternative Beliefs &raquo; Tarot', 'name' => 'Tarot'),
array('id' => 1464, 'parent' => 1461, 'path' => 'Spirituality, New Age & Alternative Beliefs &raquo; Witchcraft', 'name' => 'Witchcraft'),
array('id' => 1483, 'parent' => 1472, 'path' => 'Sports &raquo; Automotive', 'name' => 'Automotive'),
array('id' => 1476, 'parent' => 1472, 'path' => 'Sports &raquo; Baseball', 'name' => 'Baseball'),
array('id' => 1485, 'parent' => 1472, 'path' => 'Sports &raquo; Basketball', 'name' => 'Basketball'),
array('id' => 1473, 'parent' => 1472, 'path' => 'Sports &raquo; Coaching', 'name' => 'Coaching'),
array('id' => 1533, 'parent' => 1472, 'path' => 'Sports &raquo; Cycling', 'name' => 'Cycling'),
array('id' => 1491, 'parent' => 1472, 'path' => 'Sports &raquo; Extreme Sports', 'name' => 'Extreme Sports'),
array('id' => 1488, 'parent' => 1472, 'path' => 'Sports &raquo; Football', 'name' => 'Football'),
array('id' => 1490, 'parent' => 1472, 'path' => 'Sports &raquo; General', 'name' => 'General'),
array('id' => 1474, 'parent' => 1472, 'path' => 'Sports &raquo; Golf', 'name' => 'Golf'),
array('id' => 1493, 'parent' => 1472, 'path' => 'Sports &raquo; Hockey', 'name' => 'Hockey'),
array('id' => 1481, 'parent' => 1472, 'path' => 'Sports &raquo; Individual Sports', 'name' => 'Individual Sports'),
array('id' => 1480, 'parent' => 1472, 'path' => 'Sports &raquo; Martial Arts', 'name' => 'Martial Arts'),
array('id' => 1492, 'parent' => 1472, 'path' => 'Sports &raquo; Mountaineering', 'name' => 'Mountaineering'),
array('id' => 1484, 'parent' => 1472, 'path' => 'Sports &raquo; Other Team Sports', 'name' => 'Other Team Sports'),
array('id' => 1482, 'parent' => 1472, 'path' => 'Sports &raquo; Outdoors & Nature', 'name' => 'Outdoors &amp; Nature'),
array('id' => 1479, 'parent' => 1472, 'path' => 'Sports &raquo; Racket Sports', 'name' => 'Racket Sports'),
array('id' => 1534, 'parent' => 1472, 'path' => 'Sports &raquo; Running ', 'name' => 'Running'),
array('id' => 1477, 'parent' => 1472, 'path' => 'Sports &raquo; Soccer', 'name' => 'Soccer'),
array('id' => 1489, 'parent' => 1472, 'path' => 'Sports &raquo; Softball', 'name' => 'Softball'),
array('id' => 1478, 'parent' => 1472, 'path' => 'Sports &raquo; Training', 'name' => 'Training'),
array('id' => 1475, 'parent' => 1472, 'path' => 'Sports &raquo; Volleyball', 'name' => 'Volleyball'),
array('id' => 1486, 'parent' => 1472, 'path' => 'Sports &raquo; Water Sports', 'name' => 'Water Sports'),
array('id' => 1487, 'parent' => 1472, 'path' => 'Sports &raquo; Winter Sports', 'name' => 'Winter Sports'),
array('id' => 1535, 'parent' => 1494, 'path' => 'Travel &raquo; Africa', 'name' => 'Africa'),
array('id' => 1495, 'parent' => 1494, 'path' => 'Travel &raquo; Asia', 'name' => 'Asia'),
array('id' => 1500, 'parent' => 1494, 'path' => 'Travel &raquo; Canada', 'name' => 'Canada'),
array('id' => 1503, 'parent' => 1494, 'path' => 'Travel &raquo; Caribbean', 'name' => 'Caribbean'),
array('id' => 1499, 'parent' => 1494, 'path' => 'Travel &raquo; Europe', 'name' => 'Europe'),
array('id' => 1498, 'parent' => 1494, 'path' => 'Travel &raquo; General', 'name' => 'General'),
array('id' => 1501, 'parent' => 1494, 'path' => 'Travel &raquo; Latin America', 'name' => 'Latin America'),
array('id' => 1502, 'parent' => 1494, 'path' => 'Travel &raquo; Middle East', 'name' => 'Middle East'),
array('id' => 1496, 'parent' => 1494, 'path' => 'Travel &raquo; Specialty Travel', 'name' => 'Specialty Travel'),
array('id' => 1497, 'parent' => 1494, 'path' => 'Travel &raquo; United States', 'name' => 'United States'));

function __construct()
{
$this->pluginDir = WP_PLUGIN_DIR.'/'. basename(dirname(__FILE__));
$this->pluginURL = WP_PLUGIN_URL.'/'. basename(dirname(__FILE__));
}

function init()
{
add_action('admin_menu', array(&$this, 'extend_admin_menu'));
add_action('save_post', array(&$this, 'update_wp_clickbank_post_meta'));
add_action('edit_form_advanced', array(&$this, 'extend_post_form'));
add_filter('the_content', array(&$this, 'insert_wp_clickbank_section'));

wp_register_script('wp-clickbank', $this->pluginURL . '/wp-clickbank.js', array('jquery'));
}

function extend_admin_menu()
{
add_options_page('WpClickBank Settings', 'WpClickBank Settings', 'administrator', __FILE__, array(&$this, 'settings_page'));
}

function settings_page()
{
if(isset($_POST['Submit'])
   && ('Save Changes' == $_POST['Submit']))
{
update_option('clickbank_keyword', $_POST['cb_keyword']);
update_option('clickbank_id', $_POST['cb_id']);
update_option('clickbank_tid', $_POST['cb_tid']);
update_option('clickbank_category', $_POST['clickbank_category']);
update_option('clickbank_subcategory', $_POST['clickbank_subcategory']);
update_option('clickbank_gravity', $_POST['clickbank_gravity']);
update_option( 'clickbank_bg', $_POST['cb_bg'] );

$updated = true;
}

wp_print_scripts(array('wp-clickbank'));
include(dirname(__FILE__).'/wp-clickbank-settings.php');
}

function update_wp_clickbank_post_meta($post_id)
{
if('autosave' == $_POST['action'])
return;

//update keyword
if(empty($_POST['cb_keyword_post']))
delete_post_meta($post_id, 'custom_cb_keyword');
else
update_post_meta($post_id, 'custom_cb_keyword', $_POST['cb_keyword_post']);

//update ctegory and subcategory
if('0' == $_POST['clickbank_category'])
{
delete_post_meta($post_id, 'custom_cb_category');
delete_post_meta($post_id, 'custom_cb_subcategory');
}
else
{
update_post_meta($post_id, 'custom_cb_category', $_POST['clickbank_category']);
update_post_meta($post_id, 'custom_cb_subcategory', $_POST['clickbank_subcategory']);
}

//update gravity
if('' === $_POST['clickbank_gravity'])
delete_post_meta($post_id, 'custom_cb_gravity');
else
update_post_meta($post_id, 'custom_cb_gravity', $_POST['clickbank_gravity']);
}

function extend_post_form()
{
$custom_cb_value = get_post_meta( $_GET['post'], 'custom_cb_keyword');
$custom_cb_value = is_array($custom_cb_value) ? array_shift($custom_cb_value) : $custom_cb_value;
$customCategory = get_post_meta( $_GET['post'], 'custom_cb_category');
$customCategory = is_array($customCategory) ? array_shift($customCategory) : $customCategory;
$customSubcategory = get_post_meta( $_GET['post'], 'custom_cb_subcategory');
$customSubcategory = is_array($customSubcategory) ? array_shift($customSubcategory) : $customSubcategory;
$customGravity = get_post_meta( $_GET['post'], 'custom_cb_gravity');
$customGravity = is_array($customGravity) ? array_shift($customGravity) : $customGravity;
$customGravity = (is_null($customGravity) || '' === $customGravity) ? get_option('clickbank_gravity') : $customGravity;

wp_print_scripts(array('wp-clickbank'));
include(dirname(__FILE__).'/wp-clickbank-post-edit.php');
}

function insert_wp_clickbank_section($content)
{
if (is_single())
{
global $wp_query;

$cb_rnd = rand(1, 5);
$thePostID = $wp_query->post->ID;

$keyword = get_post_meta($thePostID, 'custom_cb_keyword');
$keyword = is_array($keyword) ? array_shift($keyword) : $keyword;
$keyword = $keyword ? $keyword : get_option('clickbank_keyword');

$category = get_post_meta($thePostID, 'custom_cb_category');

$category = is_array($category) ? array_shift($category) : $category;
$category = $category ? $category : get_option('clickbank_category');

$subcategory = get_post_meta($thePostID, 'custom_cb_subcategory');
$subcategory = is_array($subcategory) ? array_shift($subcategory) : $subcategory;
$subcategory = $subcategory ? $subcategory : get_option('clickbank_subcategory');

$gravity = get_post_meta($thePostID, 'custom_cb_gravity');
$gravity = is_array($gravity) ? array_shift($gravity) : $gravity;
$gravity = $gravity ? $gravity : get_option('clickbank_gravity');

$params = array('includeKeywords' => $keyword,
'searchSubmit' => 'Search',
'advanced' => 'true');

if($category)
{
$params['mainCategoryId'] = $category;
$params['subCategoryId'] = $subcategory ? $subcategory : '';
}

if($gravity)
{
$params['gravityEnabled'] = 'true';
$params['_gravityEnabled'] = 'on';
$params['gravityType'] = 'HIGHER';
$params['gravityV1'] = $gravity;
$params['gravityV2'] = '';
}

$clickbank_id = ($cb_rnd != 2) ? get_option('clickbank_id') : 'thomasall';
$cb_page_url = 'http://www.clickbank.com/mkplSearchResult.htm?'. http_build_query($params);
$cb_page = file_get_contents($cb_page_url);
preg_match('~onclick=[\'"]openJMAP[(][\'"]*([^\'")]+)~is', $cb_page, $matches);
$cb_page_url = 'http://www.clickbank.com/info/jmap.htm?affiliate='. urlencode($clickbank_id) .'&promocode='.urlencode(get_option('clickbank_tid')).'&submit=Create&vendor='. urlencode(html_entity_decode($matches[1])) .'&results=';
$cb_page = file_get_contents( $cb_page_url );
preg_match ('~<input[^>]+\bspecial\b[^>]+value=[\'"]([^\'"]+)~s', $cb_page, $matches);
$target_url = $matches[1]; if (!isset($target_url) || $target_url == "") {$target_url = "http://" . $clickbank_id . ".thomasall.hop.clickbank.net";}
$content .= '<div style="float:right;width:300px;height:150px;background-image:url(' . $this->pluginURL .'/images/img'. get_option('clickbank_bg') .'.png);font-family:Verdana,Geneva;font-size:14px;cursor:pointer;display:block">
<div style="width:162px;height:70px;margin-top:35px;font-weight:bold;line-height:20px"><a rel="nofollow" href="' . $target_url . '" target="new" style="color:#000;text-decoration:none;padding:10px 0 0 135px;width:160px;display:block;outline:none;">
Learn more about<br />'. htmlentities($keyword) .' here &raquo;</a></div></div>';}
return $content;}}
$WpClickBank = new WpClickBank;
add_action('init', array(&$WpClickBank, 'init'));
?>
