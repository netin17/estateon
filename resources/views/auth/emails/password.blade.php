Click here to reset your password: <a href="{{ $link = url('reset-password', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
