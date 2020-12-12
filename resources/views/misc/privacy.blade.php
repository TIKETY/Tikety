@extends('layout.app')

@section('content')

<section id="ourfaq" class="whitebox position-relative padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center animated wow fadeIn" data-wow-delay="300ms">
                <h2 class="heading bottom30 darkcolor font-light2">{{ __('Privacy Policy') }}
                </h2>
                <div class="col-md-8 offset-md-2">
                    <p class="heading_space"></p>
                </div>
            </div>
            <h2 class="d-none">Tabs</h2>
            <div class="col-md-12 col-sm-12">
                <div id="accordion">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="card-link darkcolor" data-toggle="collapse" href="#collapseOne">{{ __('Our Privacy Policy') }}</a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <p class="bottom20">{{ __('At tikety, accessible from www.tikety.net, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by tikety and how we use it. If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us. This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in tikety. This policy is not applicable to any information collected offline or via channels other than this website. Our Privacy Policy was created with the help of the Privacy Policy Generator and the Free Privacy Policy Generator.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseTwo">{{ __('Consent') }}</a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('By using our website, you hereby consent to our Privacy Policy and agree to its terms.')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseThree">{{ __('Information we collect') }}</a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information. If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide. When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseFour">{{ __('How we use your information') }}</a>
                        </div>
                        <div id="collapseFour" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('We use the information we collect in various ways, including to:') }}</p>
                                <li>{{ __('Provide, operate, and maintain our website') }}</li>
                                <li>{{ __('Understand and analyze how you use our website') }}</li>
                                <li>{{ __('Develop new products, services, features, and functionality') }}</li>
                                <li>{{ __('Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the webste, and for marketing and promotional purposes') }}</li>
                                <li>{{ __('Send you emails/sms') }}</li>
                                <li>{{ __('Find and prevent fraud') }}</li>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseFive">Privacy Policy </a>
                        </div>
                        <div id="collapseFive" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s randomised words which don't look even slightly believable. If
                                    you are going to use a passage of Lorem Ipsum, </p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseSix">{{ __('Log Files') }}</a>
                        </div>
                        <div id="collapseSix" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('tikety follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseSeven">{{ __('Cookies and Web Beacons') }}</a>
                        </div>
                        <div id="collapseSeven" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('Like any other website, tikety uses \'cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and/or other information.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseeight">{{ __('Advertising Partners Privacy Policies') }}</a>
                        </div>
                        <div id="collapseeight" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on tikety, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit. Note that tikety has no access to or control over these cookies that are used by third-party advertisers.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapsenine">{{ __('Third Party Privacy Policies') }}</a>
                        </div>
                        <div id="collapsenine" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('Sera ya faragha ya tikety haitumiki kwa watangazaji wengine au tovuti. Kwa hivyo, tunakushauri uwasiliane na Sera za faragha za seva hizi za matangazo ya tatu kwa habari zaidi. Inaweza kujumuisha mazoea na maagizo yao kuhusu jinsi ya kuchagua kutoka kwa chaguzi fulani. You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseten">{{ __('CCPA Privacy Rights (Do Not Sell My Personal Information)') }}</a>
                        </div>
                        <div id="collapseten" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('Under the CCPA, among other rights, California consumers have the right to: Request that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers. Request that a business delete any personal data about the consumer that a business has collected. Request that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data. If you make a request, we have one month to respond to you.If you would like to exercise any of these rights, please contact us.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapseeleven">{{ __('GDPR Data Protection Rights') }}</a>
                        </div>
                        <div id="collapseeleven" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following: The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service. The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete. The right to erasure – You have the right to request that we erase your personal data, under certain conditions. The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions. The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions. The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions. If you make a request, we have one month to respond to you.If you would like to exercise any of these rights, please contact us.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="collapsed card-link darkcolor" data-toggle="collapse" href="#collapsetwelve">{{ __('Children\'s Information') }}</a>
                        </div>
                        <div id="collapsetwelve" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ __('Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity. tikety does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
