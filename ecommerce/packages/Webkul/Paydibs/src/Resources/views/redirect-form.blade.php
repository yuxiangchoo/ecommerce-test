<form id="paydibs-form" action="{{ $endpoint }}" method="POST">
    @foreach ($data as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach
</form>

<script>document.getElementById('paydibs-form').submit();</script>