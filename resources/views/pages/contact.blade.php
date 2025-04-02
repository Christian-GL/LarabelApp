@extends('layouts.app')

@section('content')
  <div class="contact">

    <section class="contact__intro">
    <h5 class="contact__intro__minor-title">The ultimate Luxury</h5>
    <h2 class="contact__intro__mayor-title">New Details</h2>
    <div class="contact__intro__location">
      <a class="contact__intro__location__previus-location" href="{{ route('home') }}">Home</a>
      <div class="contact__intro__location__separator"></div>
      <h7 class="contact__intro__location__actual-location">Blog</h7>
    </div>
    </section>

    <section class="contact__ctn-contacts">
    @php
      $contacts = [
      ['icon' => 'mail.png', 'title' => 'Hotel Address', 'details' => ['19/A, Cirikon City hall Towers New York, NYC']],
      ['icon' => 'phone.png', 'title' => 'Phone Number', 'details' => ['+ 97656 8675 7864 7', '+ 876 766 8675 765 6']],
      ['icon' => 'location.png', 'title' => 'Email', 'details' => ['info@webmail.com', 'jobs.webmail@mail.com']]
      ];
    @endphp

    @foreach ($contacts as $contact)
    <article class="contact__ctn-contacts__ctn-entry">
      <img class="contact__ctn-contacts__ctn-entry__img" src="{{ asset('media/icon/' . $contact['icon']) }}"
      alt="{{ $contact['title'] }}">
      <div class="contact__ctn-contacts__ctn-entry__ctn-info">
      <h5 class="contact__ctn-contacts__ctn-entry__ctn-info__title">{{ $contact['title'] }}</h5>
      @foreach ($contact['details'] as $detail)
      <h6 class="contact__ctn-contacts__ctn-entry__ctn-info__text">{{ $detail }}</h6>
    @endforeach
      </div>
    </article>
  @endforeach
    </section>

    <img class="contact__img" src="{{ asset('media/img/room4.jpg') }}" alt="Room Image">

    <section class="contact__ctn-data">
    @php
      $fields = [
      ['type' => 'text', 'placeholder' => 'Your full name', 'icon' => 'personProfileGreen.png'],
      ['type' => 'text', 'placeholder' => 'Add phone number', 'icon' => 'phoneGreen.png'],
      ['type' => 'email', 'placeholder' => 'Enter email address', 'icon' => 'mailGreen.png'],
      ['type' => 'text', 'placeholder' => 'Enter subject', 'icon' => 'bookGreen.png']
      ];
    @endphp

    @foreach ($fields as $field)
    <div class="contact__ctn-data__ctn-entry">
      <input class="contact__ctn-data__ctn-entry__data" type="{{ $field['type'] }}"
      placeholder="{{ $field['placeholder'] }}">
      <img class="contact__ctn-data__ctn-entry__img" src="{{ asset('media/icon/' . $field['icon']) }}">
    </div>
  @endforeach

    <div class="contact__ctn-data__ctn-entry">
      <textarea class="contact__ctn-data__ctn-entry__data contact__ctn-data__ctn-entry__data--message"
      placeholder="Enter message"></textarea>
      <img class="contact__ctn-data__ctn-entry__img" src="{{ asset('media/icon/pencilGreen.png') }}">
    </div>
    </section>

    <div class="contact__ctn-btn">
    <button class="contact__ctn-btn__btn">Send</button>
    </div>

  </div>
@endsection