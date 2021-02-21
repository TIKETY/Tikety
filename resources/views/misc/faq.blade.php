@extends('layout.app')

@section('header_script')
<x-analytics></x-analytics>
@endsection

@section('content')

<section id="ourfaq" class="whitebox position-relative padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center animated wow fadeIn" data-wow-delay="300ms">
                <h2 class="heading bottom30 darkcolor font-light2">{{ __('Frequently Asked Questions') }}
                </h2>
                <div class="col-md-8 offset-md-2">
                    <p class="heading_space">{{ __('Looking for a quick answer? You\'ve come to the right place. Have a question that we missed? See our ') }}<a style="color: #006dbf" href="{{ route('contact', ['language'=>app()->getLocale()]) }}">{{ __('contact page') }}</a>{{ __(' and we\'d be happy to chat.') }}</p>
                </div>
            </div>
            <h2 class="d-none">Tabs</h2>
            <div class="col-md-12 col-sm-12">
                <div id="accordion">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="card-link darkcolor" data-toggle="collapse" href="#collapseOne">{{ __('What is www.tikety.co.tz?') }}</a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <p class="bottom20">{{ __('www.tikety.co.tz is the consumer facing website for our company, TIKETY TECHNOLOGIES LIMITED. We are an easy, fast and fun way for you to search and explore different kinds of tickets such as bus,flight and event in one place. Check out our ')}}<a style="color: #006dbf" href="{{ route('about', ['language'=>app()->getLocale()]) }}">{{ __('about us page ') }}</a> {{ __('to learn more.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseTwo">{{ __('Are you a start-up?') }}</a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('Yes actually, we\'ve been around since 2020!') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseThree">{{ __('What is TIKETY TECHNOLOGIES LIMITED?') }}</a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('TIKETY TECHNOLOGIES LIMITED has been around since 2020 and is a pioneer provider of fully integrated ticketing technologies, solutions, and services for thousands of top,buses, flights, arts, entertainment, and sports organizations currently in Tanzania. TIKETY TECHNOLOGIES LIMITED is a privately Company. It has 2 main business divisions: a business-to-business (B2B) division and a business-to-consumer (B2C) division both aimed at delivering awesome ticketing products and services. Check out our ')}}<a style="color: #006dbf" href="{{ route('about', ['language'=>app()->getLocale()]) }}">{{ __('about us page ') }}</a> {{ __('to learn more.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseFour">{{ __('Can I sell Tickets on www.tikety.co.tz?') }}</a>
                        </div>
                        <div id="collapseFour" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('Individual sellers cannot list tickets on Tikety.co.tz If you\'d like to learn more about becoming a client, please email: ') }}<a style="color: #006dbf" href="mailto:sales@tikety.co.tz">sales@tikety.co.tz</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseFive">{{ __('How do I order tickets?') }}</a>
                        </div>
                        <div id="collapseFive" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('There are a few ways to order tickets. In many cases we sell tickets to you directly on our handy website also in our mobile application Tikety app and get a digital ticket. In some cases, the agent will provide you a phone number to order tickets through as well. Keep your eye out on the different ways to purchase.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseSix">{{ __('How can I see where I am sitting for an event, bus, theatre or flight?') }}</a>
                        </div>
                        <div id="collapseSix" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('Once you find the service(bus, event, etc) you are looking for, you can see a seat map of the venue. During ticket purchasing process, you will have the opportunity to see your seat choice before making your purchase. If you do not see a seat map, that means we do not have one to show you. We know it\'s annoying, but we can only show what we\'ve got!') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseSeven">{{ __('Is it safe to use my credit card?') }}</a>
                        </div>
                        <div id="collapseSeven" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('Absolutely. We apply a system of Internet security technologies Well integrated APIs to assure that your transactions are safe.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseeight">{{ __('What methods of payment do you accept?') }}</a>
                        </div>
                        <div id="collapseeight" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('Visa, MasterCard, M-PESA and TIGOPESA.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapsenine">{{ __('What if I want to cancel an order or there is a problem with my tickets?') }}</a>
                        </div>
                        <div id="collapsenine" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('Tikety.co.tz sells and aggregates tickets. If there is a problem with your order, then check our ') }}<a style="color: #006dbf" href="{{ route('contact', ['language'=>app()->getLocale()]) }}">{{ __('contact page') }}</a>{{ __(' and we\'d be happy to chat.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseten">{{ __('What should I do if I cannot find an answer to my questions in the FAQs?') }}</a>
                        </div>
                        <div id="collapseten" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('If you are still having problems, check out our ') }}<a style="color: #006dbf" href="{{ route('contact', ['language'=>app()->getLocale()]) }}">{{ __('contact page') }}</a>{{ __(' and we\'d be happy to chat.') }}
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseleven">{{ __('Is my information kept private?') }}</a>
                        </div>
                        <div id="collapseleven" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('Absolutely. The information you provide Tikety.co.tz is kept in a secure location, and all credit card numbers are securely encrypted using state-of-the-art e-commerce technology. None of the information will be made available to any other sources except as noted in the www.tikety.co.tz ')}}<a style="color: #006dbf" href="{{ route('privacy',['language'=>app()->getLocale()]) }}">{{ __('Privacy Policy') }}</a> {{ __('. We do not sell your membership information to other companies. We HATE spam.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapsetwelve">{{ __('What is tikety.co.tz doing to improve website accessibility?') }}</a>
                        </div>
                        <div id="collapsetwelve" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('Tikety.co.tz has utilized guidelines issued by the Web Accessibility Initiative (WAI) of the World Wide Web Consortium (W3C) to implement functional improvements to tikety.co.tz We are always working to make sure tikety.co.tz provides the best user experience to all our fans. While we aim to make the new tikety.co.tz website as accessible as possible and to meet the latest W3C guidelines, our pages may not always pass online validation tools. If you notice ways we can improve the usability and accessibility of our website, please email: ') }}<a style="color: #006dbf" href="mailto:support@tikety.co.tz">support@tikety.co.tz</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapsethirteen">{{ __('Our Policies') }}</a>
                        </div>
                        <div id="collapsethirteen" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('The following policies apply to your purchase of tickets directly through us, Tikety.co.tz. These policies are subject to our terms of use page, which are incorporated by this reference. In addition, your attendance at an event may be subject to additional terms or restrictions of the venue/bus owner. You are urged to review your tickets for any additional information that may apply to your attendance to a venue.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapsefourteen">{{ __('Event Cancellations / Postponements') }}</a>
                        </div>
                        <div id="collapsefourteen" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('The venue or bus owner determines policies relating to the cancellation of an event/ safari, not us. These policies can vary, but generally, such policies provide a refund of the ticket price. When we issue a refund to you, we will refund the price that you paid for your ticket. Service fees, processing fees and any other fees, such as delivery fees, are not refundable.') }}</p>
                                <p>{{ __('Policies regarding postponed events vary by venue. If an event is postponed, you should contact the venue directly to obtain information about postponed dates of the event and if there is an applicable refund policy.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapsefifteen">{{ __('Ticket Limits') }}</a>
                        </div>
                        <div id="collapsefifteen" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('In an effort to give our customers an opportunity to purchase tickets to an event, venues andpromoters often set limits on the number of tickets one customer or household is allowed to purchase. You will be advised of any limits on tickets by a posting on the “buy” page for the event, or by a system limitation on the number of tickets you may purchase during your online session. Tickets purchased for an event during multiple online sessions on our website are totaled to ensure that any venue or promoter imposed limitations are not exceeded. When customers exceed these limits, their orders may not be fulfilled.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapsesixteen">{{ __('Ticket Availability') }}</a>
                        </div>
                        <div id="collapsesixteen" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('Ticket availability is subject to change. We are acting as a sales agent for venues and bus tickets. We do not control the number of tickets or the location of seats that are made available for purchase. Sometimes promoters and venues release additional tickets for an event after it has gone on sale. Tickets are also “locked” (not available) for a short time while customers complete their purchase. If a customer does not complete his or her purchase, previously locked tickets are released and made available for purchase. For these reasons and others, the tickets available for a given event can and do change rapidly. If you are unable to find tickets to an event, please check back again. Once your purchase has been completed however, we are not allowed to exchange or refund your order even if additional tickets become available at a later date.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseseventeen">{{ __('Pricing and Other Errors') }}</a>
                        </div>
                        <div id="collapseseventeen" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('If the amount you pay for a ticket is obviously incorrect, regardless of whether it is an error in a price posted on this web site or otherwise communicated to you, or you are able to order a ticket before its scheduled on-sale date, then we reserve the right, at our sole discretion, to cancel your order and refund to you the amount that you paid. This policy will apply regardless of how the error occurred.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseeighteen">{{ __('All Sales are Final') }}</a>
                        </div>
                        <div id="collapseeighteen" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('All sales completed though Tikety.co.tz are final. Our client venues do not allow us to refund or exchange any order once it has been confirmed, so please be sure you have selected the proper event and seat locations prior to completing your order. Once tickets are issued, they are like cash and will not be replaced or refunded if lost or stolen.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapsenineteen">{{ __('Ticket Resale') }}</a>
                        </div>
                        <div id="collapsenineteen" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('You understand that the resale of tickets may be subject to state and local laws and regulations. Any violation of such laws may result in your prosecution by such agencies. Tikety.co.tz assumes no liability arising from your resale or attempted resale of tickets purchased through us.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
