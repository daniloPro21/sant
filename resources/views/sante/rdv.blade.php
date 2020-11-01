
@extends('layouts.app')

@section('content')
<div class="site-wrap">
    <!-- MAIN -->
    <div class="slide-item overlay" style="background-image: url('images/hero_1.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <h1 class="heading mb-5">We Provide High Solutions for Your Health Our Doctor</h1>
            <p><a href="/" class="btn btn-primary">Get started</a></p>
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
              <span>Give us a call</span>
              <strong>1-999-123-4567</strong>
            </div>
          </a>
        </div>
        <div class="col-lg-4">
          <a href="#" class="link-lg d-flex align-items-center">
            <span class="icon-envelope"></span>
            <div>
              <span>Send us a message</span>
              <strong>info@medically.com</strong>
            </div>
          </a>
        </div>
        <div class="col-lg-4">
          <a href="#" class="link-lg d-flex align-items-center">
            <span class="icon-room"></span>
            <div>
              <span>Visit us</span>
              <strong>2918 Fake Street</strong>
            </div>
          </a>
        </div>
      </div>
    </div>







    <div class="site-section bg-light title-wrap-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto text-center">
            <span class="subheading">Our Team</span>
            <h2 class="heading"><strong class="text-primary">Our Dedicated</strong> Doctors</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section overlap-section">
      <div class="container">
        <div class="row">
            @foreach ($doctor as $doc)
            <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-5 mt-5 mb-lg-0">
                <a href="#" class="team">
                <img src="{{  asset('images/person_1.jpg') }}" alt="Image" class="img-fluid">
                <div class="team-inner">
                    <h3>{{ $doc->name }}</h3>
                    <span>{{ $doc->phone }}</span>
                    <h3></h3>
                </div>
            </a>
                <a href="#" class="btn btn-primary btn-sm mt-3" data-toggle="modal" data-target="#exampleModal">Contacter</a>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Envoyer une Demande de Rendez-vous</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('rdv.save') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Vers le docteur</label>
                                <select   data-live-search="true" class="form-contorl @error('to') is-invalid @enderror" name="to">
                                    @foreach ($doctor as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                  </select>

                                    @error('to')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                              </div>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Jour</label>
                                <input type="date" name="jour" class="form-control @error('jour') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                  <div>
                                      @error('jour')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Heure</label>
                                <input type="time" name="heure" class="form-control @error('heure') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                  <div>
                                      @error('heure')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>


                              <div class="form-group">
                                <label for="exampleInputEmail1">Motif</label>
                                <textarea name="motif" id="" class="form-control @error('motif') is-invalid @enderror" cols="40" rows="10"></textarea>
                                  <div>
                                      @error('motif')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                </div>
            </div>
                @endforeach
            </div>
      </div>
    </div>
@endsection





