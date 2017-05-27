<h1>Hello {{$user->name}}} thanks for joining our website</h1>

your activation code is: {{route('create.user.activation',$user->verification_token)}}