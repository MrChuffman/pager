@if (count($errors) > 0)
        <div class="notify alert" style="max-width: 100%">
                <span class="notify-title">Oops! You missed something:</span>
                <div class="notify-text padding10">
                        @foreach ($errors->all() as $error)
                                - {{ $error }} <br />
                        @endforeach
                </div>
        </div>
@endif
