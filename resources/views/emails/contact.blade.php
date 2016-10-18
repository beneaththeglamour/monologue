<p>You have received a message from <a href="mailto:{{ $from_email }}">{{ $from_name }}</a>.</p>

<blockquote>
<pre>{{ $contact_msg }}</pre>
</blockquote>

Best regards,<br>
{{ env('CONTACT_EMAIL_FROM_NAME') }}