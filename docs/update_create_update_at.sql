ALTER TABLE `type`
CHANGE `created_at` `created_at` timestamp NOT NULL DEFAULT now() COMMENT 'La date de création du type' AFTER `name`,
CHANGE `updated_at` `updated_at` timestamp NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'La date de la dernière mise à jour du type' AFTER `created_at`;

ALTER TABLE `brand`
CHANGE `created_at` `created_at` timestamp NOT NULL DEFAULT now() COMMENT 'La date de création du brand' AFTER `name`,
CHANGE `updated_at` `updated_at` timestamp NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'La date de la dernière mise à jour du brand' AFTER `created_at`;

ALTER TABLE `category`
CHANGE `created_at` `created_at` timestamp NOT NULL DEFAULT now() COMMENT 'La date de création du category' AFTER `name`,
CHANGE `updated_at` `updated_at` timestamp NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'La date de la dernière mise à jour du category' AFTER `created_at`;

ALTER TABLE `product`
CHANGE `created_at` `created_at` timestamp NOT NULL DEFAULT now() COMMENT 'La date de création du product' AFTER `name`,
CHANGE `updated_at` `updated_at` timestamp NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'La date de la dernière mise à jour du product' AFTER `created_at`;