<?php /* db_contact.php */

class db_contact extends db {
	public function ContactProcess($conn, $site_admin, $site_email, $title, $post, $visitor_id = 0) {
		if(self::ValidateInput($post['email'], 'string', 100) != FALSE && self::ValidateEmail($post['email']) != FALSE && self::ValidateInput($post['phone'], 'string', 20) != FALSE && self::ValidateInput($post['name'], 'string', 100) != FALSE && self::ValidateInput($post['message'], 'string', 2000) != FALSE) {
			$email = $post['email'];
			$phone = $post['phone'];
			$name = $post['name'];
			$message = $post['message'];

			$sql = $conn->prepare('INSERT INTO contact (name, email, phone, message, visitor_id) VALUES (?, ?, ?, ?, ?)');
			$sql->bindParam(1, $name, PDO::PARAM_STR);
			$sql->bindParam(2, $email, PDO::PARAM_STR);
			$sql->bindParam(3, $phone, PDO::PARAM_STR);
			$sql->bindParam(4, $message, PDO::PARAM_STR);
			$sql->bindParam(5, $visitor_id, PDO::PARAM_INT);
			$sql->execute();

			$mail_to = $site_admin . ' <' . $site_email . '>';
			$mail_subject = 'Comment from ' . $title . '';
			$mail_message = wordwrap('Name: ' . $name . '<br />Email: ' . $email . '<br />Phone: ' . $phone . '<br />Date: ' . date("F j, Y @ g:i a T") . '<br /><br />' . $message, 70);

			$mail_headers = 'From: ' . __EMAIL_HEADER_FROM . "\r\n" .
				'Reply-To: ' . __EMAIL_HEADER_REPLY_TO . "\r\n" .
				'MIME-Version: ' . __EMAIL_HEADER_MIME_VERSION . "\r\n" .
				'Content-type: ' . __EMAIL_HEADER_CONTENT_TYPE . '; charset=' . __EMAIL_HEADER_CHARSET . "\r\n" .
				'X-Mailer: ' . __EMAIL_HEADER_X_MAILER;

			mail($mail_to, $mail_subject, $mail_message, $mail_headers);

			if(__EMAIL_SENDER) {
				$mail_to = $name . ' <' . $email . '>';
				$mail_subject = 'Thank You For Contacting Me!';
				$mail_message = wordwrap('Thank you for reaching out to me at <a href="http://www.macmannis.com/">macmannis.com</a>, ' . $name . '! I appreciate you taking the time to send me this note. Please do allow me a short while to receive your message and get a reply together.' . __EMAIL_SIGNATURE, 70);
				mail($mail_to, $mail_subject, $mail_message, $mail_headers);
			}

			return TRUE;
		} else {
			return FALSE;
		}
	}
}
?>