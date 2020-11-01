@extends('layouts.app')

@section('content')

<div class="site-wrap">
    <div class="slide-item overlay" style="background-image: url('{{  asset('images/hero_1.jpg') }}')">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 align-self-center mt-5">
              <div class="card" style="width: 50rem;">
                <div class="card-body">
                  <h1 class="text-center">Veuillez Renseignez les information</h1>
                    @if (Route::has('profile.update'))
                    <form method="POST" action="{{ route('profile.store') }}"class="login100-form validate-form" enctype="multipart/form-data">
                        @csrf
                    @endif
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <div class="wrap-input100 validate-input m-b-26" data-validate="Description is required">
                                    <span class="label-input100">description</span>
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $email ?? old('description') }}" required autocomplete="description" autofocus>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="focus-input100"></span>
                                </div>
                                <div class="wrap-input100 validate-input m-b-26" data-validate="Programme is required">
                                    <span class="label-input100">Programme</span>

                                    <select multiple  data-live-search="true" class="custom-select input100 @error('programme') is-invalid @enderror" name="programme[]">
                                        <option value="lundi"  selected>lundi</option>
                                        <option value="Maridi">Maridi</option>
                                        <option value="Mercredi">Mercredi</option>
                                        <option value="Jeudi">Jeudi</option>
                                        <option value="Vendredi">Vendredi</option>
                                      </select>

                                        @error('programme')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    <span class="focus-input100"></span>
                                </div>
                                <div class="wrap-input100 validate-input m-b-26" data-validate="Ouverture is required">
                                    <span class="label-input100">Heure d'ouverture</span>
                                    <input id="heure_on" type="time" class="form-control @error('heure_on') is-invalid @enderror" name="heure_on"  required autocomplete="heure_on" autofocus>

                                    @error('heure_on')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="focus-input100"></span>
                                </div>
                                <div class="wrap-input100 validate-input m-b-26" data-validate="fermeture is required">
                                    <span class="label-input100">Heure de fermeture</span>
                                    <input id="heure_fm" type="time" class="form-control @error('heure_fn') is-invalid @enderror" name="heure_fm"  required autocomplete="heure_fm" autofocus>

                                    @error('heure_fm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="focus-input100"></span>
                                </div>

                                <div class="wrap-input100 validate-input m-b-26" data-validate="Specialite is required">
                                    <span class="label-input100">Specialite</span>
                                    <input id="specialite" type="text" class="form-control @error('specialite') is-invalid @enderror" name="specialite" required autocomplete="email" autofocus>

                                    @error('specialite')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="focus-input100"></span>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="wrap-input100 validate-input m-b-26" data-validate="Hopital is required">
                                    <span class="label-input100">Hopital</span>
                                    <input id="hopital" type="text" class="form-control @error('hopital') is-invalid @enderror" name="hopital" required autocomplete="hopital" autofocus>

                                    @error('hopital')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="focus-input100"></span>
                                </div>
                                <div class="wrap-input100 validate-input m-b-26" data-validate="Avatar is required">
                                    <span class="label-input100">Avatar</span>
                                    <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" required autocomplete="avatar" autofocus>

                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="focus-input100"></span>
                                </div>



                                <div class="wrap-input100 validate-input m-b-26" data-validate="Status is required">
                                    <span class="label-input100">Status</span>
                                    <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status"  required autocomplete="status" autofocus>

                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="focus-input100"></span>
                                </div>


                                <div class="wrap-input100 validate-input m-b-26" data-validate="Ville is required">
                                    <span class="label-input100">Ville</span>
                                    <input id="ville" type="email" class="form-control @error('ville') is-invalid @enderror" name="ville" required autocomplete="ville" autofocus>

                                    @error('ville')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="focus-input100"></span>
                                </div>
                                <div class="wrap-input100 validate-input m-b-26" data-validate="Quatier is required">
                                    <span class="label-input100">Quatier</span>
                                    <input id="quatier" type="text" class="form-control @error('quatier') is-invalid @enderror" name="quatier" equired autocomplete="quatier" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="focus-input100"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-login100-form-btn mt-4">
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {

        $('select').selectpicker();

    });

</script>
@endsection
