<div>
    <div class="container px-4 px-lg-5 mt-5">
        <!-- Filtr Formularza -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mr-3">
                    <label for="day">Day</label>
                    <select wire:model="date" class="form-control" name="day" id="day">
                        <option value="">--</option>
                        @foreach ($moviesDates as $date)
                            <option value="{{ $date['value'] }}">{{ $date['label'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mr-3">
                    <label for="hour">Hour</label>
                    <select wire:model="hour" class="form-control" name="hour" id="hour">
                        <option value="">--</option>
                        @foreach ($moviesHours as $hour)
                            <option value="{{ $hour['value'] }}">{{ $hour['label'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mr-3">
                    <label for="movie_type">Type</label>
                    <select wire:model="type" class="form-control" name="movie_type" id="movie_type">
                        <option value="">--</option>
                        <option value="1">Action</option>
                        <option value="2">Comedy</option>
                        <option value="3">Drama</option>
                        <option value="4">Romance</option>
                        <option value="5">Horror</option>
                        <option value="6">Science Fiction</option>
                        <option value="7">Fantasy</option>
                        <option value="8">Adventure</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($movies as $index => $movie)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- LASTS SEATS badge-->
                        <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                            LASTS SEATS
                        </div>
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                            alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $movie['title'] }}</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- short description-->
                                {{ $movie['description'] }}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-outline-dark mt-auto" href="#" data-toggle="modal"
                                    data-target="#movieModal_{{ $index }}">See more</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Modale dla każdego filmu -->
        @foreach ($movies as $index => $movie)
            <div class="modal fade" id="movieModal_{{ $index }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="profileModalLabel">{{ $movie['title'] }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Zamknij">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ $movie['poster_url'] }}" alt="Twoje zdjęcie profilowe" class="img-fluid">
                            <h1 id="profile-name">{{ $movie['title'] }}</h1>
                            <p id="profile-status">{{ $movie['description'] }}</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" href="#">Zobacz dostępne miejsca</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
