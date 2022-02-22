@extends('layouts.user.app')
@section('page-title','Contact Us')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-from-area padding-20-row-col">
                    <h1 class="text-brand text-center mt-3 mb-10">{{__('contact_us.contact form')}}</h1>
                    <form class="contact-form-style mt-30" id="contact-form" action="#" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="name" placeholder="{{__('contact_us.first name')}}" type="text"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="email" placeholder="{{__('contact_us.your email')}}" type="email"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="telephone" placeholder="{{__('contact_us.your phone')}}" type="tel"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="subject" placeholder="{{__('contact_us.subject')}}" type="text"/>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="textarea-style mb-30">
                                    <textarea name="message" placeholder="{{__('contact_us.message')}}"></textarea>
                                </div>
                                <button class="submit submit-auto-width" type="submit">{{__('contact_us.send message')}}</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
            <div class="col-lg-4 pl-50 d-lg-block d-none">
                <img class="border-radius-15 mt-50" src="assets/imgs/page/contact-2.png" alt=""/>
            </div>
        </div>
    </div>
@stop

