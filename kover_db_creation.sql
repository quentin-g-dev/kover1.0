CREATE TABLE `letters` (
  `user_id` int(11) NOT NULL,
  `proj_name` varchar(30) NOT NULL,
  `letter_id` int(11) NOT NULL,
  `letter_status` varchar(30) NOT NULL,
  `letter_title` varchar(50) NOT NULL,
  `letter_content` longtext NOT NULL,
  `letter_creation` varchar(255) NOT NULL,
  `letter_lastedit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `letters`
  ADD PRIMARY KEY (`letter_id`);

ALTER TABLE `letters`
  MODIFY `letter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `lang_code` varchar(10) NOT NULL,
  `creation_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
