@extends('layouts.app')



@section('content')


@if(!$profiles->isEmpty())
@foreach ($profiles as $profile )
    <div class="site-wrap">
        <div class="slide-item overlay" style="background-image: url('images/hero_1.jpg')">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 align-self-center">
                  <h1 class="heading mb-5">Consulter Votre Profile</h1>
                </div>
              </div>
            </div>
          </div>

          <div class="container quick-contact">
            <div class="row">
              <div class="col-lg-4">
                <a href="#" class="link-lg d-flex align-items-center">
                  <span class="icon-phone"></span>
                  <div>
                    <span>Your Phone</span>
                    <strong>{{ auth()->user()->phone }}</strong>
                  </div>
                </a>
              </div>
              <div class="col-lg-4">
                <a href="#" class="link-lg d-flex align-items-center">
                  <span class="icon-envelope"></span>
                  <div>
                    <span>Your Email</span>
                    <strong>{{ auth()->user()->email }}</strong>
                  </div>
                </a>
              </div>
              <div class="col-lg-4">
                <a href="#" class="link-lg d-flex align-items-center">
                  <span class="icon-room"></span>
                  <div>
                    <span>Visit us</span>
                    <strong>{{ $profile->ville }}</strong>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="site-section">
            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  <p><img src="{{ asset('uploads/'.$profile->avatar) }}"  alt="Image" class="img-fluid rounded-circle"></p>
                </div>
                <div class="col-lg-5 ml-auto">
                  <h4>Nom : {{ Auth::user()->name }}    </h4>
                  <hr>
                  <h4>Specialite : {{ $profile->specialite }}</h4>
                  <hr>
                  <h5>Hopital : {{ $profile->hopital }}</h5>
                  <h5>Ville : {{ $profile->ville }}</h5>
                </strong>
                    <strong><p>Jour de rendez-vous :
                        @foreach (unserialize($profile->programme) as $item)
                        {{ str_replace([], '', $item)}}
                        @endforeach
                    </p></strong>
                    <p>Heure de rendez-vous : de <strong>{{ $profile->heure_ou }} </strong> a <strong>{{ $profile->heure_fm }} </strong></p>

                    <p>{{$profile->description}}</p>
                  <p><a href="https://api.whatsapp.com/send?phone={{ auth()->user()->phone }}" class="btn btn-primary">Contact Us</a>
                    <a href="{{ route('profile.update') }}" class="btn btn-secondary">Edit Profile</a></p>
                    <form action="{{ route('profile.delete', $profile->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <p><button type="submit" class="btn btn-danger">Supprimer</button></p>
                       </form>
                </div>
              </div>
            </div>


            @endforeach
            <div class="container mt-5">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Mes rendez-vous</h2>
                    <table class="table table-bordered table-striped table-active">
                        <thead>
                          <tr>
                            <th scope="col">Venant de</th>
                            <th scope="col">Motif</th>
                            <th scope="col">Jour</th>
                            <th scope="col">Heure</th>
                            <th scope="col">status</th>
                            <th scope="col">Action</th>


                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($rdvs as $item)
                            <tr>
                              <td>{{ $item->from }}</td>
                              <td>{{ $item->motif }}</td>
                              <td>{{ $item->jour }}</td>
                              <td>{{ $item->heure }}</td>
                              @if ($item->status == 0)
                                <td> <button type="submit" class="btn btn-info"><i class="fa fa-calendar"></i></button> </td>
                                @endif
                            @if($item->status == 1)
                                <td><button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button></td>
                              @endif
                              @if($item->status == 2)
                              <td><button type="submit" class="btn btn-danger"><i class="fa fa-ban o"></i></button></td>
                            @endif
                              <td>
                                <form action="{{ route('rdv.status', $item->id)}}" method="post">
                                    @csrf
                                    @method('patch')
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                                    <input type="hidden" name="status" value="1">
                                   </form>
                                   <form action="{{ route('rdv.status', $item->id)}}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" id="rdv" name="status" value="2">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-ban o"></i></button>
                                   </form>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
          </div>

          @else

    <div class="site-wrap">
        <div class="slide-item overlay" style="background-image: url('{{  asset('images/hero_1.jpg') }}')">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 align-self-center">
                  <h1 class="heading mb-5">Vous n'avez pas encore de profile Veuillez Configure votre Profile</h1>
                   <p><a href="{{ route('profile.edit') }}" class="btn btn-primary">Editer son profile</a></p>
                </div>
              </div>
            </div>
          </div>
    </div>

    @endif
@endsection
