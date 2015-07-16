SET foreign_key_checks = 0;
SET time_zone = '+02:00';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';



INSERT INTO `eco_discount` (`id`, `type`, `label`, `amount`) VALUES
	(1,	'COUPON',	'$10 off all purchases',	1000),
	(2,	'PERCENT',	'15% off all purchases',	15);

INSERT INTO `eco_invoice` (`id`, `order_id`, `due_amount`, `due_datetime`, `created`) VALUES
	(1,	2,	6200,	'2014-02-07 09:43:41',	'2014-01-28 09:43:41'),
	(2,	4,	1700,	'2014-02-07 09:45:59',	'2014-01-28 09:45:59'),
	(3,	4,	1700,	'2014-02-07 09:46:00',	'2014-01-28 09:46:00'),
	(4,	4,	1700,	'2014-02-07 09:46:01',	'2014-01-28 09:46:01');

INSERT INTO `eco_order` (`id`, `user_id`, `status`, `due_amount`, `created`) VALUES
	(1,	1,	'new',	10600,	'2014-01-28 09:42:52'),
	(2,	1,	'paid',	6200,	'2014-01-28 09:43:31'),
	(3,	2,	'paid',	21345,	'2014-01-28 09:44:15'),
	(4,	3,	'error',	1700,	'2014-01-28 09:44:49'),
	(5,	4,	'paid',	85000000,	'2014-01-28 09:45:18'),
	(6,	5,	'error',	22394,	'2014-01-28 09:45:42');

INSERT INTO `eco_order_line` (`id`, `order_id`, `product_id`, `quantity`, `due_amount`) VALUES
	(1,	1,	1,	1.00,	100),
	(2,	1,	3,	1.00,	500),
	(3,	1,	6,	1.00,	10000),
	(4,	2,	2,	1.00,	200),
	(5,	2,	4,	1.00,	1000),
	(6,	2,	5,	1.00,	5000),
	(7,	3,	7,	1.00,	12345),
	(8,	3,	6,	1.00,	10000),
	(9,	4,	3,	1.00,	500),
	(10,	4,	2,	1.00,	200),
	(11,	4,	4,	1.00,	1000),
	(12,	5,	8,	1.00,	99999999),
	(13,	6,	7,	1.00,	12345),
	(14,	6,	6,	1.00,	10000),
	(15,	6,	5,	1.00,	5000);

INSERT INTO `eco_payment` (`id`, `user_id`, `order_id`, `bank_code`, `amount`, `status`, `data_dump`, `created`) VALUES
	(1,	1,	2,	'SWEDBANK',	'6200',	'paid',	'array (\n  \'isSuccessful\' => true,\n  \'isAutomatic\' => false,\n  \'response\' => \n  array (\n    \'VK_SERVICE\' => \'1101\',\n    \'VK_VERSION\' => \'008\',\n    \'VK_SND_ID\' => \'HP\',\n    \'VK_REC_ID\' => \'uid501295\',\n    \'VK_STAMP\' => \'2\',\n    \'VK_T_NO\' => \'72487\',\n    \'VK_AMOUNT\' => \'62\',\n    \'VK_CURR\' => \'EUR\',\n    \'VK_REC_ACC\' => \'1234567890\',\n    \'VK_REC_NAME\' => \'SWED\',\n    \'VK_SND_ACC\' => \'221295680140\',\n    \'VK_SND_NAME\' => \'Tõõger Leõpäöld\',\n    \'VK_REF\' => \'123\',\n    \'VK_MSG\' => \'Example comment\',\n    \'VK_T_DATE\' => \'28.01.2014\',\n    \'VK_ENCODING\' => \'utf-8\',\n    \'VK_LANG\' => \'EST\',\n    \'VK_MAC\' => \'XDw8EpuDfWKaAZDxM0BAmAyoQwKgquRmh2E8Dr/cnomF8hP2rZzQl+VGqvZTW0lrfJOKxPPgYPWkymR6a3NfUe7ivYDKvHC1snLVn8g72WR0PFihsUPxSFBKrilYb/6DfgcNduJ/QmpFqjVXprrBq9tuf35JAru3v0WJLqggOGC+53xXxutq5YAEWvUI2J9IyTY9K/hb2EF8T6Kj97qPHmSOT64JKbD1p0hoQr2D5Ja6HciiVpCqVVgYcdUUf4pYiyWTcpsdbxaGPNNS6nIWHuAkDPu3lz/0D6mKldWpRn9qn6d6wOfCBpllHsQ5Dz5I//JanYmkyRJGc/H8G4tLfQ==\',\n    \'VK_AUTO\' => \'N\',\n  ),\n)',	'2014-01-28 09:43:37'),
	(2,	2,	3,	'SEB',	'21345',	'paid',	'array (\n  \'isSuccessful\' => true,\n  \'isAutomatic\' => false,\n  \'response\' => \n  array (\n    \'VK_SERVICE\' => \'1101\',\n    \'VK_VERSION\' => \'008\',\n    \'VK_SND_ID\' => \'EYP\',\n    \'VK_REC_ID\' => \'uid501305\',\n    \'VK_STAMP\' => \'3\',\n    \'VK_T_NO\' => \'72488\',\n    \'VK_AMOUNT\' => \'213.45\',\n    \'VK_CURR\' => \'EUR\',\n    \'VK_REC_ACC\' => \'1234567890\',\n    \'VK_REC_NAME\' => \'SEB O�\',\n    \'VK_SND_ACC\' => \'10155992282253\',\n    \'VK_SND_NAME\' => \'T��ger Le�p��ld\',\n    \'VK_REF\' => \'123\',\n    \'VK_MSG\' => \'Example comment\',\n    \'VK_T_DATE\' => \'28.01.2014\',\n    \'VK_CHARSET\' => \'ISO-8859-1\',\n    \'VK_LANG\' => \'EST\',\n    \'VK_MAC\' => \'eqSA0MvD3CCDz3tsCz03foecjlId70KzyeiAlaB2+Fc2+iAgBGkyhwei7cbXb8HVkrEQ02aUq+luHkHvcWfO2erBKcB06Bh5C3KPGTUSfQaPFwHU+Dxquw2SbZGR06RvFfRflhNkO2Wu034ax4CC6x22qm57646SYQMrpk7XOAXbX7PxUOZ2GhL2ZobImCVw3p/pXc0thbkAxKJLWHGOmRrz13OPGWJNaihYuq+E2Yz4w8Cwzh1IqBQa2yHWpwg+cH/91tilILdfpis2YZJPDRoSPDZRVvHaPML9Zwik1Z851eOTKIzni/30SRdv9PA2dMizty070yc67duI9AazzQ==\',\n    \'VK_AUTO\' => \'N\',\n  ),\n)',	'2014-01-28 09:44:20'),
	(3,	3,	4,	'DANSKE',	'1700',	'error',	'array (\n  \'isSuccessful\' => false,\n  \'isAutomatic\' => false,\n  \'response\' => \n  array (\n    \'VK_SERVICE\' => \'1901\',\n    \'VK_VERSION\' => \'008\',\n    \'VK_SND_ID\' => \'SAMPOPANK\',\n    \'VK_REC_ID\' => \'uid501318\',\n    \'VK_STAMP\' => \'4\',\n    \'VK_REF\' => \'123\',\n    \'VK_MSG\' => \'Example comment\',\n    \'VK_LANG\' => \'EST\',\n    \'VK_MAC\' => \'u4rvLCnbDIXrsd84x0tBnAgEKssYckn9cosRvZmW7itjElDVNj0avzFyMqQ8E4UtO7IrxQMAlui3flDFAnVvXcSOLdRMcKYu9nAiLRe0xQ2mtJbj3iy4cAZzqBEsF8biEODhE+DaXYOqnBkyfWrpPI6rN8wEeBX+2oYzZBgtSx9tyAPEQ1DYL+F/SqQNAaQVKeJUSoTGDoz+lpA7LG94OYjClwXR/Rqw/dKsbrUB12Jbt5l44F+T4Q+mO9asifA8B8CIOR4LPFVKwKFU36UCgSv3eg5E3QAr6ksstkhmGv3LIbCi8t6Te1y7vGd/HAJsWnl1fQbDsNjC7OIDPm+nFA==\',\n    \'VK_AUTO\' => \'N\',\n  ),\n)',	'2014-01-28 09:44:54'),
	(4,	4,	5,	'KREDIIDIPANK',	'85000000',	'paid',	'array (\n  \'isSuccessful\' => true,\n  \'isAutomatic\' => false,\n  \'response\' => \n  array (\n    \'VK_SERVICE\' => \'1101\',\n    \'VK_VERSION\' => \'008\',\n    \'VK_SND_ID\' => \'KREP\',\n    \'VK_REC_ID\' => \'uid501321\',\n    \'VK_STAMP\' => \'5\',\n    \'VK_T_NO\' => \'72491\',\n    \'VK_AMOUNT\' => \'850000\',\n    \'VK_CURR\' => \'EUR\',\n    \'VK_REC_ACC\' => \'1234567890\',\n    \'VK_REC_NAME\' => \'Krediidipanga klient\',\n    \'VK_SND_ACC\' => \'4213446270766\',\n    \'VK_SND_NAME\' => \'Tõõger Leõpäöld\',\n    \'VK_REF\' => \'123\',\n    \'VK_MSG\' => \'Example comment\',\n    \'VK_T_DATE\' => \'28.01.2014\',\n    \'VK_CHARSET\' => \'utf-8\',\n    \'VK_LANG\' => \'EST\',\n    \'VK_MAC\' => \'PYLNxfUGNanDM0hhUtMt+VvBFnr9vU8pYZ+PvNoh3T/fGQiQprPv/K94JXzd+HDdBLldeMHH3CvlR6mKDAmO/9EVl52F69KKOEH+iobfYnQp4j3jLdZ6h1MAHyz200Vy2oq1uboFIdFnG2LEP/RLFqaqs0hmYLWBtgCvMYxEG0JU3LSLzg0IMjDPFab5ACFoJx38jTsgQltGzAA/RUsU7BAcmi6TsAEwvYyjxOixrpVMeUo8g/ipFMjdN/VDEUMCqWjNBJCUUfPyuU8d42zaAygPAv9Yr0s8TmQOEk8Fz0k6C051JzFRUXOmPGI2NOBVlLJiUDzKnC9Zk5cPOAbGkQ==\',\n    \'VK_AUTO\' => \'N\',\n  ),\n)',	'2014-01-28 09:45:24'),
	(5,	5,	6,	'ESTCARD',	'22394',	'error',	'array (\n  \'isSuccessful\' => false,\n  \'isAutomatic\' => NULL,\n  \'response\' => \n  array (\n    \'action\' => \'afb\',\n    \'ver\' => \'004\',\n    \'id\' => \'uid501347 \',\n    \'ecuno\' => \'000100000006\',\n    \'receipt_no\' => \'000000\',\n    \'eamount\' => \'000000022394\',\n    \'cur\' => \'EUR\',\n    \'respcode\' => \'111\',\n    \'datetime\' => \'20140128094542\',\n    \'msgdata\' => \'Tõõger Leõpäöld                         \',\n    \'actiontext\' => \'Tehing katkestatud                      \',\n    \'charEncoding\' => \'UTF-8\',\n    \'mac\' => \'a118ad00aa7988e012e1d97ed959504373b6b1b47656dc9e4599f5bf8ba963229a14449ee0ea67f4eb7ad83d839b7e56c4cce74d1b1e2b12b64aa0b9455d6d56d87e9c002148012b21c23a0f7a20902160628fc0b4f19a7e8086ecdfed09048f8aa3e4a3edf52173fb31d354bd0c3ea81e9efb64911961064ca3b25181bb69d4eb6a34c497336130dfe7f97aa8a777b8ac2448f4e12e3b7d01197ec2af5e1980609de04d3cd48f539f845dbea4f3625719e022dad015c4ce6b28bf7d85a584a6fa09870a1378d82d1706f674e7a34debc4c0818e4c6396a15188e27484ff9ff12b8c4aa363a5e5eb93b050170404799665bc19e00e98c43d062cf63ea6c7b183\',\n    \'auto\' => \'N\',\n  ),\n)',	'2014-01-28 09:45:48');

INSERT INTO `eco_product` (`id`, `name`, `price`) VALUES
	(1,	'Crocs Unisex Crocband Clog',	100),
	(2,	'Levi\'s Slight Curve Straight Women\'s Jeans',	200),
	(3,	'Invicta Men\'s Quartz Watch',	500),
	(4,	'Canon EOS 600D Digital SLR Camera',	1000),
	(5,	'Braun Oral-B Triumph 4000 Four-Mode Power Toothbrush ',	5000),
	(6,	'Pintoy Wooden Trike',	10000),
	(7,	'PetGear by Happy Pet Dog Seat Belt',	12345),
	(8,	'1 Carat Diamond Pave Setting Bracelet in 9ct Yellow Gold',	99999999);

INSERT INTO `eco_user` (`id`, `name`) VALUES
	(1,	'Example User 1'),
	(2,	'Example User 2'),
	(3,	'Example User 3'),
	(4,	'Example User 4'),
	(5,	'Example User 5');
