<?php include ROOT.'/views/layouts/header.php';

echo '<h1>Обратная связь</h1>';

$form = <<<_FORM
    <div class="well">
			<p class="lead">
				Написать e-mail администрации проекта
			</p>
		</div>

		<div class="contact-form">
                    <form class="form-horizontal col-md-8" role="form" method="post">

			  <div class="form-group">
				<label for="name" class="col-md-2">Имя</label>
				<div class="col-md-10">
                                    <input type="text" class="form-control" id="name" name="userName"  placeholder="Ваше имя">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="email" class="col-md-2">Email</label>
			    <div class="col-md-10">
                                <input type="email" class="form-control" id="email" name="userEmail" placeholder="Ваш Email" value="$userEmail" />
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="subject" class="col-md-2">Тема</label>
			    <div class="col-md-10">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Тема сообщения">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="message" class="col-md-2">Сообщение</label>
			    <div class="col-md-10">
                                <textarea class="form-control" id="message" name="userText" placeholder="До N символов. Предложения сотрудничества, ошибки, пожелания">$userText</textarea>
			    </div>
			  </div>

			  <div class="form-group">
			  	<div class="col-md-12 text-right">
                                    <button type="submit" name="submit" class="btn btn-lg btn-primary">Отправить сообщение!</button>
			  	</div>
			  </div>
			</form>	
		</div>
_FORM;

if($result)
{
    echo '<p>Сообщение отправлено! Мы ответим Вам на указанный email.</p>';
}
elseif(isset($errors) && is_array($errors))
{
    echo '<ul>';
    foreach($errors as $error)
    {
        echo '<li>'.$error.'</li>';
    }
    echo '</ul>';
    echo "$form";
}
else
{
    echo $form;
}

include ROOT.'/views/layouts/footer.php';
?>