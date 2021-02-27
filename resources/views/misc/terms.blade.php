@extends('layout.app')

@section('header_script')
<x-analytics></x-analytics>
@endsection

@section('content')

<section id="ourfaq" class="whitebox position-relative padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center animated wow fadeIn" data-wow-delay="300ms">
                <h2 class="heading bottom30 darkcolor font-light2">{{ __('Terms of Use') }}
                </h2>
                <div class="col-md-12 offset-md-12">
                    <p class="heading_space"></p>
                </div>
            </div>
            <h2 class="d-none">Tabs</h2>
            <div class="col-md-8 offset-md-2 col-sm-12">
                <div id="accordion">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="card-link darkcolor" data-toggle="collapse" href="#collapseOne">{{ __('Our Terms of Use') }}</a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <pre class="">
{{ __('The following Terms of Use (this "Agreement") describes the terms and conditions under which the') }}
{{ __('services of this Tikety.co.tz website (this "Website") are provided. By accessing this Website and') }}
{{ __('using any service provided by this Website, including but not limited to viewing any of its content or') }}
{{ __('purchasing any ticket or merchandise, or utilization of any resources, information, content, materials') }}
{{ __('and results or output derived from such services or products on the Website, you expressly agree to') }}
{{ __('be bound by this Agreement, including the terms of our Privacy Policy, and all applicable laws and') }}
{{ __('regulations governing the use of this Website. In this Agreement, underlined terms serve as links to') }}
{{ __('pages within this Website that contain important information concerning your use of our services. We') }}
{{ __('suggest that you access and become familiar with these pages, including but not limited to our') }}
{{ __('Privacy Policy and Our Policy regarding ticket purchases, as you read this Agreement. If you do not') }}
{{ __('agree with this Agreement, Privacy Policy, or Policy regarding ticket purchases, then you are not') }}
{{ __('authorized to use the Website.') }}
{{ __('Tikety.co.tz may revise and update these Terms of Use from time to time without notification to its') }}
{{ __('users. Accordingly, we encourage our users to regularly check this Agreement for changes.') }}
<strong>{{ __('1. Introduction') }}</strong>
{{ __('This Agreement, and use of the website, is an online service provided by Tikety.co.tz,') }}
{{ __('TIKETY TECHNOLOGIES LIMITED (sometimes referred to herein as the "Company", "we"') }}
{{ __('or "our") with a principal place of business in Tanzania. The website consists of ticketing') }}
{{ __('services, which may include facilitation of the purchase or sale of tickets to Bus tickets,') }}
{{ __('access to other ticket resources, and related content provided by the Company and by third') }}
{{ __('parties.') }}
{{ __('This Website is subject to the terms and restrictions contained herein and is for private') }}
{{ __('personal use by consumers only ("Users"). Any other use or attempt to use this Website, or') }}
{{ __('any of the services provided through this Website for commercial purposes (including the') }}
{{ __('purchase of tickets for the purpose of resale), directly or indirectly, by you or by a third party') }}
{{ __('is strictly prohibited.') }}
<strong>{{ __('2. Changes in Terms and Conditions')}}</strong>
{{ __('The Company reserves the right to modify, suspend, or discontinue any aspect or feature of')}}
{{ __('this Website, or this Agreement at any time. This includes but is not limited to, the right to')}}
{{ __('change or discontinue any service provided by the Company, content displayed on this')}}
{{ __('Website, hours of availability, and equipment needed for access or to use this Website, at')}}
{{ __('any time. Tikety.co.tz shall not be liable to you or any third party for any modification,')}}
{{ __('suspension, or discontinuance. The failure of Tikety.co.tz to exercise or enforce any right or')}}
{{ __('provision of these Terms of Use shall not constitute a waiver of such right or provision.')}}
{{ __('Unless expressly stated otherwise, any new features that augment or enhance the current')}}
{{ __('services provided though this Website also will be subject to the provisions of this')}}
{{ __('Agreement.')}}
<strong>{{ __('3. Permitted Use of This Website')}}</strong>
{{ __('This Website is the property of TIKETY TECHNOLOGIES LIMITED and your access to this')}}
{{ __('Website is with our permission. Any unauthorized access or use will be, among other things,')}}
{{ __('a trespass, and we reserve the right to pursue our legal rights for any unauthorized access or')}}
{{ __('use of this Website, including seeking civil remedies and equitable relief to the fullest extent')}}
{{ __('possible, as well as referral of matters to appropriate law enforcement agencies.')}}
<strong>{{ __('4. Prohibited Use of this Website')}}</strong>
{{ __('You are prohibited from doing any act that has the effect of undermining the integrity of our')}}
{{ __('system, this Website, our services and the method by which we provide our services to')}}
{{ __('users.')}}
{{ __('a.  As a material term of this Agreement, you expressly agree that you shall NOT do any of the')}}
{{ __('    following:')}}
{{ __('    i.      Deploy or facilitate the use or deployment of any robot, spider, scraper or any')}}
{{ __('            other automated means, method or device to view, select or copy any')}}
{{ __('            content from this Website;')}}
{{ __('    ii.     Deploy or facilitate the use or deployment of any script, routine, program or')}}
{{ __('            any other automated means, method or device with respect to this Website')}}
{{ __('            for any other purpose, including but not limited to purchasing tickets;')}}
{{ __('    iii.    Deploy or facilitate the use or deployment of any program, system, means,')}}
{{ __('            method or device, for any purpose that places an unreasonable, unnecessary')}}
{{ __('            or excessive demand or load on this Website, its hardware and connections,')}}
{{ __('            or prohibits, denies or delays access to this Website by others;')}}
{{ __('    iv.     Purchase any tickets offered through this Website for the purposes of')}}
{{ __('            reselling those tickets, except as permitted by applicable law. If we determine')}}
{{ __('            that you are purchasing an irregularly large number of tickets to an event or')}}
{{ __('            multiple events, we will presume that you are purchasing such tickets for')}}
{{ __('            resale purposes and at our sole election, we will cancel your transaction(s)')}}
{{ __('            and restrict your access to this Website;')}}
{{ __('    v.      Download or copy any content displayed on this Website for purposes other')}}
{{ __('            than preserving information for your personal use;')}}
{{ __('    vi.     Establish any deep link or other connection to any specific page or pages of')}}
{{ __('            this Website other than the home page, without Company\'s prior written')}}
{{ __('            permission;')}}
{{ __('    vii.    Deploy or facilitate the use or deployment of any automatic or manual device,')}}
{{ __('            process or means to circumvent, avoid or defeat any of our security')}}
{{ __('            measures or systems, including but not limited to the "CAPTCHA" system')}}
{{ __('            used as part of this Website\'s ticket purchasing process. The CAPTCHA')}}
{{ __('            system requires the typing of characters on your computer screen, and you')}}
{{ __('            expressly agree that the typing will only be done manually by you on the')}}
{{ __('            keyboard of the computer you are using to access this Website;')}}
{{ __('    viii.   Access, reload or refresh this Website\'s transactional event or ticketing')}}
{{ __('            pages, or make any other request to this Website\'s transactional servers,')}}
{{ __('            more than once during any two second interval; or')}}
{{ __('    ix.     Request more than 500 pages of this Website in any twenty-four hour period.')}}

{{ __('b.  You expressly agree that you will use this Website only for lawful purposes. You will')}}
{{ __('    not post or transmit through this Website any material which:')}}
{{ __('    i.      Violates or infringes in any way upon the rights of others.')}}
{{ __('    ii.     Is unlawful, threatening, abusive, defamatory, invasive of privacy or publicity')}}
{{ __('            rights, vulgar, obscene, profane or otherwise objectionable.')}}
{{ __('    iii.    Encourages conduct that would constitute a criminal offense, give rise to civil')}}
{{ __('            liability or otherwise violate any law.')}}
{{ __('    iv.     Creates or attempts to create any liability of the Company.')}}
{{ __('    v.      Contains advertising or any solicitation with respect to products or services,')}}
{{ __('            unless we have approved such material in writing, in advance of its transmission.')}}
{{ __('    vi.     Introduces any program, executable file or routine (such as a worm, Trojan horse,')}}
{{ __('            cancelbot, time bomb or virus) into our system for any purpose, irrespective of')}}
{{ __('            whether any such program or routine results in detrimental harm to our system or')}}
{{ __('            our data.')}}
{{ __('    vii.    Threatens the continuous services of our ISP\'s, suppliers and vendors. Any conduct')}}
{{ __('            by you that in our sole discretion restricts, inhibits, or interferes with any other')}}
{{ __('            consumer from using or enjoying this Website is expressly prohibited.')}}
<strong>{{ __('5. Transaction and Processing Fees')}}</strong>
{{ __('There is no fee for accessing this Website and viewing our content and the content of third')}}
{{ __('parties that we display.If you decide to purchase tickets or other merchandise, you agree to pay,')}}
{{ __('in addition to the price for the ticket or merchandise, other fees and charges that we may impose,')}}
{{ __('including but not limited to,, convenience fees, processing fees, method of delivery fees and other')}}
{{ __('miscellaneous fees. The amount of each fee may vary, depending on the tickets or merchandise you')}}
{{ __('purchase and the method you select to receive your tickets or merchandise. Fees and charges, including')}}
{{ __('(but not limited to) charges for issuance, convenience, handling, processing, shipping, delivery,')}}
{{ __('(including but not limited to, charges for Republic Express or other courier delivery), and any other')}}
{{ __('miscellaneous charges assessed by us represent, among other things, the costs we incur in providing')}}
{{ __('our goods and services to you. The fees and charges we assess may be greater than our actual cost of')}}
{{ __('providing those services, and we may retain a portion of all such fees and charges as profit.')}}
{{ __('You are urged to review all pages displayed during your completion of a purchase. All fees')}}
{{ __('and charges related to your transaction will be disclosed to you during the purchase process.')}}
{{ __('If you do not agree to pay the fees or charges associated with your purchase, you may')}}
{{ __('cancel your transaction.')}}
<strong>{{ __('6. Links to Other Websites')}}</strong>
{{ __('We may, from time to time, display icons, graphic or textual links to other websites, or display')}}
{{ __('selected pages of other websites not affiliated with Tikety.co.tz. Any content, product or')}}
{{ __('service provided by other websites is under the exclusive control of such third parties and not')}}
{{ __('TIKETY TECHNOLOGIES LIMITED. Your access to and use of any other Website, and any')}}
{{ __('transaction in which you engage on any other website, is subject to the applicable user')}}
{{ __('agreements and privacy policies of that website.')}}

{{ __('By access and use of any other website, you expressly disclaim all liability of Tikety.co.tz')}}
{{ __('with respect to your, or third party\'s actions on these other websites. The Company reserves')}}
{{ __('the exclusive right and sole discretion to add, decline or remove, without notice, any icon or')}}
{{ __('link to another website.')}}
<strong>{{ __('7. Electronic Communications')}}</strong>
{{ __('Subject to the Privacy Policy, when you purchase tickets or merchandise from us, or when')}}
{{ __('you become a registered user with us to facilitate future transactions, you are communicating')}}
{{ __('with us electronically and by doing so, you consent to receive electronic communications')}}
{{ __('from us regarding a purchase you are making or an event to which you have purchased')}}
{{ __('tickets. Additionally, by consenting to accept electronic communications from us, you also')}}
{{ __('agree that all agreements, disclosures and notices, including any updates to this Agreement,')}}
{{ __('may be provided to you electronically and that an electronic communication from us satisfies')}}
{{ __('any legal requirement that a communication be in writing.')}}

{{ __('In addition, when you purchase tickets or merchandise from us, or when you become a')}}
{{ __('registered user with us, you agree that you have established a business or personal')}}
{{ __('relationship with the Company and you consent to receive email notices,Short Message')}}
{{ __('Service or advertisements from us in the future about events, products or services that may')}}
{{ __('be of interest to you. If you are not interested in receiving Short Message Service, email')}}
{{ __('notices or advertisements from us, you should unsubscribe now.')}}
<strong>{{ __('8. Downloading Of Intellectual Property')}}</strong>
{{ __('Other than third party materials that Tikety.co.tz uses in accordance with applicable law and')}}
{{ __('content posted by Users, TIKETY TECHNOLOGIES LIMITED owns all Website software,')}}
{{ __('design, text, images, photographs, illustrations, audio clips, video clips, artwork, graphic')}}
{{ __('content, and other copyrightable elements, including the selection and arrangement thereof,')}}
{{ __('trademarks, service marks and trade names (collectively, the "NDI Elements"). The NDI')}}
{{ __('Elements are protected, without limitation, pursuant to UNITED REPUBLIC OF TANZANIA')}}
{{ __('(URT) and foreign copyright and trademark laws. You agree not to reproduce, modify, create')}}
{{ __('derivative works from, display, perform, publish, distribute, disseminate, broadcast or')}}
{{ __('circulate any NDI Elements to any third party (including, without limitation, the display and')}}
{{ __('distribution of the NDI Elements via your own or a third party website) without TIKETY')}}
{{ __('TECHNOLOGIES LIMITED\'s express prior written consent.')}}

{{ __('You further agree that you will not disassemble, decompile, reverse engineer or otherwise modify')}}
{{ __('any software included in the NDI Elements. Any unauthorized or prohibited use may subject the')}}
{{ __('offender to civil liability and criminal prosecution under applicable federal and state laws. TIKETY')}}
{{ __('TECHNOLOGIES LIMITED neither warrants nor represents that your use of the NDI Elements will not')}}
{{ __('infringe rights of third parties. The trademarks, logos, and service marks (collectively the')}}
{{ __('"Trademarks") displayed on this Website are registered and unregistered marks of TIKETY TECHNOLOGIES')}}
{{ __('LIMITED or are otherwise used in accordance with applicable law. Nothing contained on this Website')}}
{{ __('should be construed as granting, by implication, estoppel, or otherwise, any license or right to use')}}
{{ __('any Trademark displayed on this Website without Tickets.com\'s written permission. Your use of the')}}
{{ __('Trademarks displayed on this Website, except as provided in these Terms of Use, is strictly prohibited.')}}
{{ __('TIKETY TECHNOLOGIES LIMITED will aggressively enforce its intellectual property rights to the fullest')}}
{{ __('extent of the law.')}}
<strong>{{ __('9. Disclaimers, Limitation of Liability, Releases')}}</strong>
{{ __('YOU AGREE THAT USE OF THIS WEBSITE IS AT YOUR OWN RISK. YOU WILL BE RESPONSIBLE FOR PROTECTING THE')}}
{{ __('CONFIDENTIALITY OF YOUR PASSWORD, IF ANY. NEITHER THE COMPANY, ITS PARENT COMPANY, NOR ANY OF THEIR')}}
{{ __('RESPECTIVE EMPLOYEES, SHAREHOLDERS, AGENTS, THIRD PARTY CONTENT PROVIDERS OR LICENSORS, REPRESENT OR')}}
{{ __('WARRANT THAT YOUR USE OF THIS WEBSITE WILL BE UNINTERRUPTED OR ERROR FREE; NOR DO THEY MAKE ANY')}}
{{ __('WARRANTY AS TO THE RESULTS THAT MAY BE OBTAINED FROM USE OF THIS WEBSITE, OR AS TO THE ACCURACY,')}}
{{ __('RELIABILITY OR CONTENT OF ANY INFORMATION, SERVICE, OR MERCHANDISE PROVIDED THROUGH THIS WEBSITE.')}}
{{ __('THIS WEBSITE IS PROVIDED ON AN "AS IS" BASIS WITHOUT REPRESENTATIONS OTHER THAN THOSE IN THIS TERMS')}}
{{ __('OF USE DOCUMENTATION, OR WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED')}}
{{ __('TO, WARRANTIES OF TITLE OR IMPLIED WARRANTIES OF MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE,')}}
{{ __('OTHER THAN THOSE WARRANTIES WHICH ARE IMPLIED BY AND INCAPABLE OF EXCLUSION, RESTRICTION OR MODIFICATION')}}
{{ __('UNDER THE LAWS APPLICABLE TO THIS AGREEMENT. THE DISCLAIMERS CONTAINED IN THIS AGREEMENT APPLY TO ANY')}}
{{ __('DAMAGES OR INJURY CAUSED BY ANY FAILURE OF PERFORMANCE, ERROR, OMISSION, INTERRUPTION, DELETION,')}}
{{ __('DEFECT, DELAY IN OPERATION OR TRANSMISSION, COMPUTER VIRUS, COMMUNICATION LINE FAILURE, THEFT OR')}}
{{ __('DESTRUCTION OR UNAUTHORIZED ACCESS TO, ALTERATION OF, OR USE OF RECORD, WHETHER FOR BREACH OF')}}
{{ __('CONTRACT, TORTUOUS BEHAVIOR, NEGLIGENCE, OR UNDER ANY OTHER CAUSE OF ACTION. YOU SPECIFICALLY ACKNOWLEDGE')}}
{{ __('THAT NEITHER THE COMPANY NOR ITS PARENT COMPANY IS LIABLE FOR THE DEFAMATORY, OFFENSIVE OR')}}
{{ __('ILLEGAL CONDUCT OF OTHER USERS OR THIRD PARTIES AND YOU ASSUME THE RISK OF INJURY FROM ANY OF THE FOREGOING.')}}
{{ __('IN NO EVENT WILL THE COMPANY, ITS PARENT COMPANY, OR ANY PERSON OR ENTITY INVOLVED IN CREATING,')}}
{{ __('PRODUCING OR MAINTAINING THIS WEBSITE BE LIABLE FOR ANY DAMAGES, INCLUDING, WITHOUT LIMITATION, DIRECT,')}}
{{ __('INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL OR PUNITIVE DAMAGES ARISING OUT OF THE USE OF OR INABILITY')}}
{{ __('TO USE THIS WEBSITE. BECAUSE SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OR LIMITATION OF INCIDENTAL OR')}}
{{ __('CONSEQUENTIAL DAMAGES, THE ABOVE EXCLUSIONS OF INCIDENTAL AND CONSEQUENTIAL DAMAGES MAY NOT APPLY TO YOU,')}}
{{ __('BUT WILL APPLY, IN ANY EVENT, TO THE MAXIMUM EXTENT POSSIBLE. IN ADDITION TO THE TERMS SET FORTH ABOVE,')}}
{{ __('NEITHER THE COMPANY NOR ITS PARENT COMPANY, INFORMATION PROVIDERS, OR CONTENT PROVIDERS WILL BE')}}
{{ __('LIABLE REGARDLESS OF THE CAUSE OR DURATION, FOR ANY ERRORS, INACCURACIES, OMISSIONS, OR OTHER')}}
{{ __('DEFECTS IN, OR UNTIMELINESS OF, THE INFORMATION CONTAINED WITHIN THIS WEBSITE, OR FOR ANY DELAY OR')}}
{{ __('INTERRUPTION IN THE TRANSMISSION THEREOF TO ANY USER, OR FOR ANY CLAIMS OR LOSSES ARISING FROM')}}
{{ __('USING THIS WEBSITE. NONE OF THE FOREGOING PARTIES WILL BE LIABLE FOR ANY THIRD-PARTY CLAIMS OR LOSSES')}}
{{ __('OF ANY NATURE, INCLUDING, BUT NOT LIMITED TO, LOST PROFITS, PUNITIVE OR CONSEQUENTIAL DAMAGES.')}}
{{ __('ANY LIABILITY THAT THE COMPANY, ITS PARENT COMPANY, AND THEIR RESPECTIVE OFFICERS, DIRECTORS,')}}
{{ __('AGENTS AND EMPLOYEES MAY HAVE TO YOU UNDER ANY CIRCUMSTANCES WILL BE LIMITED TO THE GREATER')}}
{{ __('OF')}}
{{ __('    (A) THE TOTAL AMOUNT EXPENDED BY YOU WITH US DURING THE TRANSACTION GIVING RISE TO THE CLAIM; OR')}}
{{ __('    (B) TZS 1000. YOU EXPRESSLY ACKNOWLEDGE THAT YOU MAY HAVE OR MAY IN THE FUTURE HAVE CLAIMS AGAINST')}}
{{ __('        THE COMPANY WHICH YOU DO NOT NOW KNOW OR SUSPECT TO EXIST IN YOUR FAVOR WHEN YOU AGREED TO THE')}}
{{ __('        TERMS AND CONDITIONS OF THIS AGREEMENT, AND WHICH IF KNOWN, MIGHT MATERIALLY AFFECT YOUR CONSENT')}}
{{ __('        TO THE TERMS AND CONDITIONS OF THIS AGREEMENT.')}}
<strong>{{ __('10. Equipment')}}</strong>
{{ __('You will be responsible for obtaining and maintaining all telephones, Internet connections,')}}
{{ __('computer hardware, and other equipment needed for access to and use of this Website and')}}
{{ __('for any and all charges related thereto.')}}
<strong>{{ __('11. Trademarks')}}</strong>
{{ __('TIKETY TECHNOLOGIES LIMITED takes great care in the development and protection of its')}}
{{ __('trademarks, service marks and logos and reserves all rights of ownership of its trademarks.')}}
{{ __('Some of its trademarks and service marks include:')}}
{{ __('Tikety.co.tz®, Tikety.co.tz with Design® Tikety logo®.')}}
{{ __('Nothing contained in this Website should be construed as granting by implication, estoppel,')}}
{{ __('or otherwise, a license or right to use any trademarks displayed on this Website without the')}}
{{ __('prior written permission of TIKETY TECHNOLOGIES LIMITED, or their respective owners.')}}
<strong>{{ __('12. Copyright Compliance')}}</strong>
{{ __('To ensure compliance with the The Copyright Society of Tanzania (COSOTA) TIKETY')}}
{{ __('TECHNOLOGIES LIMITED will take action on receipt of notice of alleged copyright')}}
{{ __('infringement. If you are a copyright owner or representative of the owner and believe that a')}}
{{ __('user has submitted or uploaded material that infringes upon your United States copyrights,')}}
{{ __('you may submit notification in accordance to the COSOTA by providing TIKETY')}}
{{ __('TECHNOLOGIES with the following information in writing:')}}
{{ __('    i.      Identification of the copyrighted work claimed to have been infringed, or, if')}}
{{ __('            multiple copyrighted works are covered by a single notification, a representative')}}
{{ __('            list of such works;')}}
{{ __('    ii.     Identification of the claimed infringing material and information reasonably')}}
{{ __('            sufficient to permit us to locate the material on this Website (such as the')}}
{{ __('            URL(s) of the claimed infringing material);')}}
{{ __('    iii.    Information reasonably sufficient to permit us to contact you, such as an')}}
{{ __('            address, telephone number, and, if available, an Email address;')}}
{{ __('    iv.     A statement by you that you have a good faith belief that the disputed use is')}}
{{ __('            not authorized by the copyright owner, its agent, or the law;')}}
{{ __('    v.      A statement by you, made under the penalty of perjury, that the above')}}
{{ __('            information in your notification is accurate and that you are the owner of an')}}
{{ __('            exclusive right that is allegedly infringed or are authorized to act on the')}}
{{ __('            owner\'s behalf; and')}}
{{ __('    vi.     Your physical or electronic signature.')}}

{{ __('    Please send all written correspondence of alleged infringements to:')}}
{{ __('    Tanzania, Region Kilimanjaro, District Moshi CBD, Ward Mji mpya, Postal')}}
{{ __('    code 25111, Street LANGONI, Road SHOSHOTE, Plot number 1035, Block')}}
{{ __('    number 30255, House number MM/29/35')}}
{{ __('    You may also contact TIKETY TECHNOLOGIES LIMITED\'s Copyright Agent')}}
{{ __('    by email (yusuph@tikety.co.tz or kea@tikety.co.tz ) or mobilephone')}}
{{ __('    (+255759777031 or +255654660654)')}}
<strong>{{ __('13. Our Content')}}</strong>
{{ __('A portion of the content for this Website is supplied by third parties. Any opinions, advice,')}}
{{ __('statements, services, offers, or other information or content expressed or made available by')}}
{{ __('third parties, including information providers, are those of the respective authors or')}}
{{ __('distributors. Neither the Company nor any third-party provider of information guarantees the')}}
{{ __('accuracy, completeness, or usefulness of any content, nor its merchantability or fitness for')}}
{{ __('any particular purpose. We neither endorse nor are responsible for the accuracy or reliability')}}
{{ __('of any opinion, advice or statement made on this Website by anyone other than our')}}
{{ __('authorized spokespersons while acting in their official capacities.')}}
<strong>{{ __('14. Breach')}}</strong>
{{ __('Without limiting any other remedies that we may have available at law or in equity, upon our')}}
{{ __('confirmation that you have breached any provision of this Agreement or the agreements')}}
{{ __('referenced in this Agreement, we may, without notice, cancel any pending transactions you')}}
{{ __('may have with us and restrict or deny your access to our Website and services, including')}}
{{ __('any services we provide through channels other than the Internet. You acknowledge and')}}
{{ __('agree that monetary damages may not be a sufficient remedy to the Company for a breach')}}
{{ __('of this Agreement and you consent to injunctive or other equitable relief for any alleged')}}
{{ __('breach.')}}
<strong>{{ __('15. Binding Arbitration')}}</strong>
{{ __('Any dispute relating to or arising from your purchase of any tickets or other merchandise')}}
{{ __('through this Website; or arising under this Agreement, in which monetary damages are being')}}
{{ __('sought, will be resolved by binding arbitration conducted in accordance with the Commercial')}}
{{ __('Rules of the URT. To the extent practicable, hearings will be conducted via telephone or')}}
{{ __('other electronic means intended to facilitate a forum in which a hearing may be had.. Upon')}}
{{ __('conclusion of the arbitration, any court having jurisdiction over the matter may enter')}}
{{ __('judgment on any award issued in the arbitration.')}}
<strong>{{ __('16. Legal Proceedings')}}</strong>
{{ __('Any legal proceeding, which is commenced for the purposes of seeking injunctive or other')}}
{{ __('equitable relief, will be adjudicated by a court of competent jurisdiction sitting in the URT, and')}}
{{ __('you and the Company expressly consent to the personal jurisdiction of the URT courts sitting')}}
{{ __('in URT.')}}
<strong>{{ __('17. Indemnification')}}</strong>
{{ __('You agree that you will, at your expense, indemnify, defend, settle, and hold the Company,')}}
{{ __('its parent company, and their respective directors, officers, shareholders, employees,')}}
{{ __('agents, and assigns harmless from and against all claims and expenses, including attorneys')}}
{{ __('fees, arising out of your use of this Website, including but not limited to any use of this')}}
{{ __('Website that is not authorized by this Agreement. In addition you will pay any judgment')}}
{{ __('awarded against us or any settlement agreed to by you, and any authorized expenses')}}
{{ __('incurred by us. TIKETY TECHNOLOGIES LIMITED reserves the right to assume the')}}
{{ __('exclusive defense and control of any matter otherwise subject to indemnification by you, in')}}
{{ __('which event you will assist and cooperate with TIKETY TECHNOLOGIES in asserting any')}}
{{ __('available defenses.')}}
<strong>{{ __('18. Notices')}}</strong>
{{ __('All notices regarding any matter pertaining to this Agreement, or the policies referenced')}}
{{ __('herein, including any notice of claim, summons or subpoena will be given by first class mail')}}
{{ __('or courier, postage or air bill prepaid, and sent to: TIKETY TECHNOLOGIES Tanzania,')}}
{{ __('Region Kilimanjaro, District Moshi CBD, Ward Mji mpya, Postal code 25111, Street')}}
{{ __('LANGONI, Road SHOSHOTE, Plot number 1035, Block number 30255, House number')}}
{{ __('MM/29/35, Attention: Legal Department. Notice will be deemed effective 3 days after deposit')}}
{{ __('with the Tanzania Postal Service or courier. In addition, the Company may provide notice to')}}
{{ __('you by either email or by registered courier, sent to the physical or email address you')}}
{{ __('provided to us during any transaction conducted with us. Notice will be deemed effective 24')}}
{{ __('hours after sending of an email (unless returned due to an invalid email address) or 3 days')}}
{{ __('after mailing.')}}
<strong>{{ __('19. General')}}</strong>
{{ __('This Agreement is to be construed in accordance with the laws of the United Repulic Of')}}
{{ __('Tanzania, without regard to its conflict of laws provisions. This Agreement, as updated from')}}
{{ __('time to time, constitutes the entire agreement between us, with respect to the terms and')}}
{{ __('conditions of use of this Website and supersedes all previous written or oral agreements')}}
{{ __('between us. If any provision of this Agreement is held to be invalid or unenforceable, such')}}
{{ __('provision will be struck and the remaining provisions will be enforced. The section headings')}}
{{ __('in this Agreement are for reference purposes only and in no way limit or describe the scope')}}
{{ __('of a particular section. Our failure to enforce any breach of this Agreement by you or others')}}
{{ __('does not constitute a waiver of our right to enforce the terms of this Agreement in the future')}}
{{ __('for a similar breach.')}}
<strong>{{ __('20. Mobile')}}</strong>
{{ __('We currently provide our mobile services for free, but your carrier\'s normal rates and fees,')}}
{{ __('such as mobile access, data and text messaging fees, may still apply.')}}
<strong>{{ __('21. Contact')}}</strong>
{{ __('Please report any violations of these Terms of Use by contacting TIKETY TECHNOLOGIES')}}
{{ __('LIMITED, Tanzania, Region Kilimanjaro, District Moshi CBD, Ward Mji mpya, Postal code')}}
{{ __('25111, Street LANGONI, Road SHOSHOTE, Plot number 1035, Block number 30255,')}}
{{ __('House number MM/29/35, Attention: Legal Department. Questions about the Terms of Use')}}
{{ __('may be directed to support@tikety.co.tz.')}}
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
