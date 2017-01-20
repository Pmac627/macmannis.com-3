CREATE TABLE IF NOT EXISTS `about` (
  `about_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(100) NOT NULL,
  `descr` varchar(500) NOT NULL,
  `img` varchar(100) NOT NULL,
  `inverted` tinyint(1) NOT NULL DEFAULT '0',
  `year` int(4) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`about_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6;

INSERT INTO `about` (`about_id`, `title`, `subtitle`, `descr`, `img`, `inverted`, `year`, `sort`, `active`) VALUES
(1, 'Saint Vincent College', 'Humble Beginnings', 'My coding career began in my dorm room at Saint Vincent College with Notepad and an old computer. My first project <a href=''http://omhsmi.org/'' target=''_blank'' title=''Our Mission House Publishing''>omhsmi.org</a> was underway and MacMannis Web Development was born!', 'view/img/about/saint-vincent-college.jpg', 0, 2009, 1, 1),
(2, 'To-Do List', 'Projects Begin To Flow', 'During the summer of 2011, clients began rolling in and I recruited the help of Graphic Designer Kelly Timo. Together, we tackled half a dozen projects and expanded our network base and skill-sets along the way.', 'view/img/about/flow.jpg', 1, 2011, 2, 1),
(3, '.NET', 'A New World', 'New employment with a fantastic company sidelined my freelance business. But when one door closes, another opens. My experiences at Zap Solutions immediately launched me to a whole new level of development I had only dreamed of! Within the first few months, I learned .NET as well as advanced SQL techniques at a proficient level.', 'view/img/about/dot-net.jpg', 0, 2013, 3, 1),
(5, 'HTML5', 'What Will Be Next?', 'Where will 2017 take me? The real question is, where can I help you take your next project? Send me a note on the <a href=''#contact'' class=''page-scroll'' title=''Contact MacMannis Web Development''>contact form</a> to get the ball rolling!', 'view/img/about/html5.jpg', 0, 2017, 5, 1),
(4, 'Cadence', 'A New "Cadence" In Life', 'A fantastic opportunity presented itself in 2015. Grabbing the opportunity by the horns, development on the Cadence DMS (Distribution Management System) began. Look for a launch June 2017!', 'view/img/about/cadence.jpg', 1, 2015, 4, 1);

CREATE TABLE IF NOT EXISTS `certs` (
  `cert_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cert_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;

INSERT INTO `certs` (`cert_id`, `url`, `img`, `title`, `sort`, `active`) VALUES
(1, 'http://www.mycertprofile.com/Profile/2344620882', 'view/img/certs/microsoft-certified-professional.jpg', 'Microsoft&reg; Certified Professional', 3, 1),
(2, 'http://www.mycertprofile.com/Profile/2344620882', 'view/img/certs/microsoft-specialist-c-sharp.jpg', 'Microsoft&reg; Specialist: Programming in C#', 2, 1),
(3, 'http://www.mycertprofile.com/Profile/2344620882', 'view/img/certs/microsoft-certified-solutions-associate-web-applications.jpg', 'Microsoft&reg; Certified Solutions Associate: Web Applications *Charter Member', 1, 1);

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;

INSERT INTO `clients` (`client_id`, `url`, `img`, `title`, `sort`, `active`) VALUES
(1, 'http://www.indsci.com/', 'view/img/logos/industrial-scientific.jpg', 'Industrial Scientific', 1, 1),
(2, 'http://www.csem.com/', 'view/img/logos/center-for-safety-and-environmental-management.jpg', 'Center for Safety & Environmental Management', 2, 1),
(3, 'http://www.ibspa.com/', 'view/img/logos/irwin-builders-supply.jpg', 'Irwin Builders Supply', 3, 1),
(4, 'http://sourcingservicesllc.com/', 'view/img/logos/sourcing-services.jpg', 'Sourcing Services, LLC', 4, 1);

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `lookup_whitelist_ip` (
  `lookup_whitelist_ip_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip4` varchar(85) NOT NULL,
  PRIMARY KEY (`lookup_whitelist_ip_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(160) NOT NULL,
  `meta_descr` varchar(160) NOT NULL,
  `meta_keywords` varchar(160) NOT NULL,
  `meta_follow` tinyint(1) NOT NULL DEFAULT '0',
  `meta_index` tinyint(1) NOT NULL DEFAULT '0',
  `meta_canonical` varchar(100) NOT NULL,
  `show_me` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `preload_queue` varchar(2000) NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;

INSERT INTO `pages` (`page_id`, `title`, `meta_descr`, `meta_keywords`, `meta_follow`, `meta_index`, `meta_canonical`, `show_me`, `deleted`, `preload_queue`) VALUES
(1, '.NET, PHP, HTML, CSS, SQL and JS Apps', 'MacMannis.com; Web Architecture for a Semantic Web! .NET, PHP, HTML, CSS, SQL and JS Development', 'macmannis.com,macmannis,web architecture,web design,web development,.net,php,html5,css3,sql,database,responsive development', 1, 1, '', 1, 0, ''),
(2, 'Oops!', '', '', 0, 0, 'error', 1, 0, ''),
(3, 'Closed', '', '', 0, 0, 'error/closed', 1, 0, '');

CREATE TABLE IF NOT EXISTS `people` (
  `people_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `motto` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `url1` varchar(100) NOT NULL,
  `url1_title` varchar(100) NOT NULL,
  `url1_css_icon` varchar(100) NOT NULL,
  `url2` varchar(100) NOT NULL,
  `url2_title` varchar(100) NOT NULL,
  `url2_css_icon` varchar(100) NOT NULL,
  `url3` varchar(100) NOT NULL,
  `url3_title` varchar(100) NOT NULL,
  `url3_css_icon` varchar(100) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`people_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;

INSERT INTO `people` (`people_id`, `name`, `motto`, `img`, `url1`, `url1_title`, `url1_css_icon`, `url2`, `url2_title`, `url2_css_icon`, `url3`, `url3_title`, `url3_css_icon`, `sort`, `active`) VALUES
(1, 'Kelly Timo', 'Awesome Graphic Designer', 'view/img/team/kelly.jpg', 'https://www.facebook.com/kelly.timo.9', 'Facebook', 'fa-facebook', '', '', '', '', '', '', 1, 1),
(2, 'Patrick MacMannis', 'Yours Truly', 'view/img/team/pat.jpg', 'https://twitter.com/pat_macmannis/', 'Twitter', 'fa-twitter', 'https://www.facebook.com/pat.macmannis', 'Facebook', 'fa-facebook', 'https://www.linkedin.com/in/patmacmannis', 'LinkedIn', 'fa-linkedin', 2, 1),
(3, 'Amanda Ray', 'Fantastic Graphic Designer', 'view/img/team/amanda.jpg', 'http://www.araypgh.com/', 'Online Portfolio', 'fa-desktop', 'https://www.facebook.com/mandee.ray', 'Facebook', 'fa-facebook', 'https://www.linkedin.com/pub/mandee-ray/20/948/a48/en', 'LinkedIn', 'fa-linkedin', 3, 1);

CREATE TABLE IF NOT EXISTS `portfolio` (
  `portfolio_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `img_preview` varchar(100) NOT NULL,
  `descr` varchar(2000) NOT NULL,
  `project_date` varchar(50) NOT NULL,
  `client` varchar(100) NOT NULL,
  `technologies` varchar(500) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`portfolio_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7;

INSERT INTO `portfolio` (`portfolio_id`, `service_id`, `title`, `subtitle`, `img`, `img_preview`, `descr`, `project_date`, `client`, `technologies`, `sort`, `active`) VALUES
(1, 1, 'Metragenix', '2-to-1 Protein Bars.', 'view/img/portfolio/2-to-1.png', 'view/img/portfolio/2-to-1-preview.png', 'The Metragenix 2-to-1 Protein Bar website was contracted out to IMS while I was the lead developer. I was given a flat PSD file as the design and utilized the latest in CSS3, HTML5 and JavaScript to make their vision come to life. The site features a dynamic menu with detailed dropdowns under each category of protein bar.', 'November 2012', 'Metragenix (under IMS)', 'PHP, HTML5, CSS3, JS, jQuery', 1, 1),
(2, 1, 'MacMannis.com (v2)', 'Personal portfolio and digital online resume.', 'view/img/portfolio/macmannis-v2.png', 'view/img/portfolio/macmannis-v2-preview.png', 'Version 2 of MacMannis.com was a major step up from it''s predicessor. I used this project as an opportunity to play around with the new CSS3 techniques and HTML5 semantic tags. Using CodeIgniter as my backend framework, MacMannis.com was able to be extremely dynamic and all content was stored within the database for easier changes. I also experimented with Responsive Web Design with this project.', 'January 2013', 'N/A', 'PHP, CodeIgniter, HTML5, CSS3, JS, jQuery, SQL', 2, 1),
(3, 1, 'Sourcing Services', 'Leading provider of supply chain services.', 'view/img/portfolio/sourcing-services.png', 'view/img/portfolio/sourcing-services-preview.png', 'Sourcing Services, LLC approached me to create a new, simple website to offer up information about what they are all about. Using similar industry websites, I created a basic and professional website that met all the criteria for Sourcing Services while still remaining within their budget. This site is built on top of my homemade MVC framework that allows for clean URLs, dynamic content and file downloads.', 'January 2015', 'Sourcing Services, LLC', 'PHP, HTML5, CSS3, JS, jQuery', 3, 1),
(4, 3, 'Center for Safety & Environmental Management', 'Quote tool ultimate make-over.', 'view/img/portfolio/csem.png', 'view/img/portfolio/csem-preview.png', 'Center for Safety & Environmental Management (CSEM) came to me with their outdated quote tool in hand looking for a much needed upgrade. I created an entirely new instance of the old ColdFusion application with PHP and SQL. Along the way, I also fixed errors that had been plaguing their platform for many years and managed to include some new features CSEM had been needing for years.', 'June 2014', 'Center for Safety & Environmental Management', 'PHP, HTML5, CSS3, JS, SQL', 4, 1),
(5, 1, 'Our Mission House Publishing', 'Non-profit Catholic childrens book sellers.', 'view/img/portfolio/omhsmi.png', 'view/img/portfolio/omhsmi-preview.png', 'The Sisters of Mary Immaculate had always needed a way to advertise their Catholic childrens books and supplies. So, I created a simple website to help spread the word about their services and background. The site was inspired by the signature 3 blue stripes they are always wearing. After its original release, the site was reworked to be responsive.', 'September 2009', 'Sisters of Mary Immaculate', 'PHP, HTML, CSS, SQL', 5, 1),
(6, 4, 'Industrial Scientific', 'Database upgrades and enhancements.', 'view/img/portfolio/isc.png', 'view/img/portfolio/isc-preview.png', 'Industrial Scientific contacted me about an older Access database they had been using for nonconforming part reports. I modified their existing database to allow new fields and information to be entered into Access and stored properly in the database. Additionally, I optimized the SQL and stored data to help increase the speed of their application.', 'October 2014', 'Industrial Scientific, Corp.', 'VBA, SQL', 6, 1);

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(5000) NOT NULL,
  `author` varchar(50) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `show_me` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `uc_pageid_section` (`page_id`,`section`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `sections` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(250) NOT NULL,
  `descr` varchar(1000) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `hide_header` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`section_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10;

INSERT INTO `sections` (`section_id`, `title`, `subtitle`, `descr`, `active`, `hide_header`) VALUES
(1, 'Services', 'Here are just a few of the services I offer.', '', 1, 0),
(2, 'Portfolio', 'Here are just a handful of the projects I have worked on.', '', 1, 0),
(3, 'About', 'Everyone has a story! Here''s mine.', '', 1, 0),
(4, 'People', 'Here I am with a few of the awesome people I have worked with.', 'I have worked on multiple projects with each of these designers and they have produced some of the coolest designs I have ever seen on the web.', 1, 0),
(5, 'Contact Me', 'Let me know what I can do for you.', '', 1, 0),
(6, 'Clients', 'Here are just some of the companies I have helped.', '', 1, 1),
(7, 'Error', 'Something didn''t happen the way it was supposed to. A log has been made.', '', 1, 0),
(8, 'Closed', 'Sorry! The site is closed for the moment. Check back soon!', '', 1, 0),
(9, 'Certifications', 'I am constantly striving to improve my craft.', '', 1, 0);

CREATE TABLE IF NOT EXISTS `services` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `descr` varchar(100) NOT NULL,
  `subtitle` varchar(500) NOT NULL,
  `css_icon` varchar(100) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`service_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;

INSERT INTO `services` (`service_id`, `descr`, `subtitle`, `css_icon`, `sort`, `active`) VALUES
(1, 'Web Development', 'Create a full stack solution for your web-based needs! I write all front, back and database code custom to your application.', 'fa-code', 1, 1),
(2, 'Responsive Design', 'Make sure your web application looks great on any device! I optimize all projects to take full advantage of the latest RWD techniques.', 'fa-tablet', 2, 1),
(3, 'Application Upgrade', 'Sometimes old faithful needs a tune-up! I will take on your outdated application and bring it up to spec with the latest technologies.', 'fa-wrench', 3, 1),
(4, 'Database Development', 'The most valuable resource for most businesses is information! I can create custom databases and reports to get you the data you need.', 'fa-database', 4, 1);

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` char(32) NOT NULL,
  `data` longtext NOT NULL,
  `last_accessed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `site` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `lang` varchar(2) NOT NULL DEFAULT 'en',
  `charset` varchar(20) NOT NULL DEFAULT 'utf-8',
  `content_type` varchar(20) NOT NULL DEFAULT 'text/html',
  `ga_code` varchar(200) NOT NULL,
  `base_url` varchar(150) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `open` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`site_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;

INSERT INTO `site` (`site_id`, `title`, `lang`, `charset`, `content_type`, `ga_code`, `base_url`, `admin`, `admin_email`, `open`) VALUES
(1, 'MacMannis Web Development', 'en', 'utf-8', 'text/html', '2SrQP-qonPjeiKmmGA7sARrWcl9Ibaeq-OocK2FNJ6M', '//www.macmannis.com/', 'Patrick MacMannis', 'pat@macmannis.com', 1);

CREATE TABLE IF NOT EXISTS `visitors` (
  `visitor_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL DEFAULT '1',
  `ip4` varchar(85) NOT NULL,
  `ip6` varchar(40) NOT NULL,
  `last_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_visits` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`visitor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `vwFindVisitor` (
`visitor_id` int(11)
,`ip4` varchar(85)
,`site_id` int(11)
,`total_visits` int(11)
,`whitelisted` int(0)
);

CREATE TABLE IF NOT EXISTS `vwPortfolioData` (
`portfolio_id` int(11)
,`service_descr` varchar(100)
,`title` varchar(100)
,`subtitle` varchar(100)
,`img` varchar(100)
,`img_preview` varchar(100)
,`descr` varchar(2000)
,`project_date` varchar(50)
,`client` varchar(100)
,`technologies` varchar(500)
,`active` tinyint(1)
);

DROP TABLE IF EXISTS `vwFindVisitor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`username`@`localhost` SQL SECURITY DEFINER VIEW `vwFindVisitor` AS select `v`.`visitor_id` AS `visitor_id`,`v`.`ip4` AS `ip4`,`v`.`site_id` AS `site_id`,`v`.`total_visits` AS `total_visits`,(case when (`i`.`lookup_whitelist_ip_id` is not null) then 1 else 0 end) AS `whitelisted` from (`visitors` `v` left join `lookup_whitelist_ip` `i` on((convert(`i`.`ip4` using utf8) = `v`.`ip4`)));

DROP TABLE IF EXISTS `vwPortfolioData`;

CREATE ALGORITHM=UNDEFINED DEFINER=`username`@`localhost` SQL SECURITY DEFINER VIEW `vwPortfolioData` AS select `p`.`portfolio_id` AS `portfolio_id`,`s`.`descr` AS `service_descr`,`p`.`title` AS `title`,`p`.`subtitle` AS `subtitle`,`p`.`img` AS `img`,`p`.`img_preview` AS `img_preview`,`p`.`descr` AS `descr`,`p`.`project_date` AS `project_date`,`p`.`client` AS `client`,`p`.`technologies` AS `technologies`,`p`.`active` AS `active` from (`portfolio` `p` left join `services` `s` on((`s`.`service_id` = `p`.`service_id`))) order by `p`.`sort`;
