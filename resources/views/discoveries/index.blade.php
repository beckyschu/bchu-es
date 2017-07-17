<html>
    <head>
        <title>Discoveries</title>
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}" />
    </head>

    <body>
<div class="panel panel-primary">
    <div class="panel-heading">
        Discoveries <small>({{ $discoveries->count() }})</small>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="container">
                <form action="{{ url('search') }}" method="get">
                    <div class="form-group">
                        <input
                                type="text"
                                name="q"
                                class="form-control"
                                placeholder="Search..."
                                value="{{ request('q') }}"
                        />
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="container">
                @forelse ($discoveries as $discovery)
                    <discovery>
                        <h2>{{ $discovery->title }}</h2>

                        <p>{{ $discovery->url }}</body>

                        <p class="well">
                            {{ implode(', ', $discovery->keyword ?: []) }}
                        </p>
                    </discovery>
                @empty
                    <p>No discovery found</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

    </body>
</html>
