@extends('layouts.auth')

@section('content')


	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
	
	
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Terms & Conditions</h5>
                    <p>These Terms, Privacy, Policy and Conditions of Service ("Terms of Service") govern your account on
                        lifecarehub.com, lifecarehub.com mobile site (the "lifecarehub.com Sites" or the "Sites"), and
                        lifecarehub.com mobile apps (the "lifecarehub.com Mobile Apps" or the "Apps") and your use of the
                        Sites and all products and services provided through the lifecarehub.com Sites. lifecarehub.com is
                        operated by E-LIFECARE SDN BHD ("lifecarehub.com," "we", or “our”) and provides the content
                        posted on the Sites subject to the following Terms of Service. The terms and conditions stated herein
                        shall constitute a legal agreement between you and us.
                        These Terms of Service incorporate the entirety of the lifecarehub.com Privacy Policy posted on the
                        Sites. Please read these Terms of Service carefully. By accessing and using the Sites, you agree to
                        be bound by these Terms of Service. You may not use the Sites if you do not accept the Terms of
                        Service.
                        lifecarehub.com reserves the right to add to, delete, or change the Terms of Service at any time at its
                        sole discretion, without notice. As such, you should check these Terms of Service from time to time
                        for such changes. Any such changes, whether or not reviewed by you, shall constitute your consent
                        and acceptance to such changes.</p>
                    <h5>1. Definitions</h5>
                    <h6>A. Parties</h6>
                    <p>"You" and "your" refer to you, as a user of the Site. A "user" is someone who accesses, browses,
                        crawls, scrapes, or in any way uses the Site. "We," "us," and "our" refer to lifecarehub.com.</p>
                    <h6>B. Content</h6>
                    <p>"Content" means text, images, photos, audio, video, location data, and all other forms of data or
                        communication. "Your Content" means Content that you submit or transmit to, through, or in
                        connection with the Site, such as ratings, reviews, compliments, invitations, check-ins, messages, and
                        information that you publicly display or displayed in your account profile. "User Content" means
                        Content that users submit or transmit to, through, or in connection with the Site. "lifecarehub.com
                        Content" means Content that we create and make available in connection with the Site. "Third Party
                        Content" means Content that originates from parties’ other than lifecarehub.com or its users, which is
                        made available in connection with the Site. "Site Content" means all of the Content that is made
                        available in connection with the Site, including Your Content, User Content, Third Party Content, and
                        lifecarehub.com Content.</p>
                    <p>2. Changes to the Terms of Service
                        We may modify the Terms from time to time.The most current version of these Terms will be located
                        here. You understand and agree that your access to or use of the Site is governed by the Terms
                        effective at the time of your access to or use of the Site. If we make material changes to these Terms,
                        we will notify you by email or by posting a notice on the Site prior to the effective date of the changes.
                        We will also indicate at the top of this page the date that revisions were last made. You should revisit
                        these Terms on a regular basis as revised versions will be binding on you. Any such modification will
                        be effective and bind on you upon our posting of new Terms. You understand and agree that your
                        continued access to,or use of the Site after the effective date of modifications to the Terms indicates
                        your acceptance of the modifications.</p>
                    <h5>3. Using the Site</h5>
                    <h6>A. Permission to Use the Site</h6>
                    <p>We grant you a revocable, non-exclusive, non-transferable, non-assignable, and limited permission to
                        use the Site subject to the restrictions in these Terms. Your use of the Site is at your own risk,
                        including the risk that you might be exposed to Content that is offensive, indecent, inaccurate,
                        objectionable, or otherwise inappropriate.</p>
                    <h6>B. Site Availability</h6>
                    <p>The Site may be modified, updated, interrupted, suspended, or discontinued at any time without
                        notice or liability. You agree that the Sites and/or Apps is being provided to you on a reasonable effort
                        basis,</p>
                    <h6>C. User Accounts</h6>
                    <p>You must create an account and provide certain information about yourself in order to use some of
                        the features that are offered through the Site. You are responsible for maintaining the confidentiality of
                        your account password. You are also responsible for all activities that occur in connection with your
                        account. You agree to notify us immediately of any unauthorized use of your account.
                        Lifecarehub.com will not be liable for any loss that you may incur as a result of someone else using
                        your account, either with or without your knowledge. In addition, you may be held liable for any losses
                        incurred by lifecarehub.com or another party due to someone else using your account. You may not
                        use anyone else's account at any time. We reserve the right to close your account at any time for any
                        or no reason. In creating it, we ask that you provide complete and accurate information about yourself
                        to bolster your credibility as a contributor to the Site. You may not impersonate someone else (e.g.,
                        adopt the identity of a celebrity or your next-door neighbour), create or use an account for anyone
                        other than yourself, provide an email address other than your own, or create multiple accounts. If you
                        use a pseudonym, take care to note that others may still be able to identify you if, for example, you
                        include identifying information in your reviews, use the same account information on other sites, or
                        allow other sites to share information about you with lifecarehub.com. Please read our Privacy Policy
                        for more information.</p>
                    <h6>D. Communications from Lifecarehub.com and other Users</h6>
                    <p>By creating an account, you agree to receive certain communications in connection with the Site. You
                        may receive our weekly email newsletter. You can opt-out of non-essential communications here.
                        A copy of lifecarehub.com Privacy Policy that applies to the collection, use, disclosure and other
                        processing of personal information by lifecarehub.com are posted on the Sites. These Terms of
                        Service incorporate the entirety of the lifecarehub.com Privacy Policy. You consent to any personal
                        information we may obtain about you (either via the lifecarehub.com Sites, by email, telephone, or any
                        other means) being collected, stored and otherwise processed in accordance with the terms of the
                        Privacy Policy.</p>
                    <h5>4. Site Content</h5>
                    <h6>A. Responsibility for Your Content</h6>
                    <p>You alone are responsible for Your Content, and once published, it cannot always be withdrawn. You
                        assume all risks associated with Your Content, including anyone's reliance on its quality, accuracy, or
                        reliability, or any disclosure by you of information in Your Content that makes you personally
                        identifiable. You represent that you own or have the necessary permissions to use and authorize the
                        use of Your Content as described herein. You may not imply that Your Content is in any way
                        sponsored or endorsed by lifecarehub.com. You shall include as a party in respect of any document
                        (including proof of payment) between you and the end-buyer.
                        You may expose yourself to liability if, for example, Your Content contains material that is false,
                        intentionally misleading, or defamatory; violates any third-party right, including any copyright,
                        trademark, patent, trade secret, moral right, privacy right, right of publicity, or any other intellectual
                        property or proprietary right; contains material that is unlawful, including illegal hate speech or
                        pornography; exploits or otherwise harms minors; or violates or advocates the violation of any law or
                        regulation which we shall not make responsible on the liabilities arises from Your Content.
                        By using the Sites and/or App, you represent and warrant to us that: -</p>
                    (a) you have the right, authority and capacity to use the Sites and/or App and to abide by the
                    Terms of Service;<br>
                    (b) all the information which you provide to us and/or post on the Sites and/or App shall be
                    accurate, true and complete;<br>
                    (c) you have obtained all license, permit, consent and/or approval to promote, market, sell or
                    make available your product and/or service on the App or through the Sites and/or App;<br>
                    (d) the source and/or supply of your goods and/or services are legal and lawful;<br>
                    (e) you undertake not to authorize others to use your identity or user status, and you may not
                    assign or otherwise transfer your user account to any other person or entity (unless otherwise
                    stated);<br>
                    (f) you agree to comply with all applicable laws, orders, practice notes, guidelines and/or notices
                    of Malaysia;<br>
                    (g) you will provide all necessary documents and/or proof in their original form if required by us or
                    any appropriate authorities, including any licensed financial institution.<br>
                    <h6>B. Our Right to Use Your Content</h6>
                    <p>We may use Your Content in a number of different ways, including publicly displaying it, reformatting
                        it, incorporating it into advertisements and other works, creating derivative works from it, promoting it,
                        distributing it, and allowing others to do the same in connection with their own websites and media
                        platforms ("Other Media"). As such, you hereby irrevocably grant us world-wide, perpetual, nonexclusive, royalty-free, assignable, sublicensable, transferable rights to use Your Content for any
                        purpose.
                        Please note that you also irrevocably grant the users of the Site and any Other Media the right to
                        access Your Content in connection with their use of the Site and any Other Media. Finally, you
                        irrevocably waive, and cause to be waived, against lifecarehub.com and its users any claims and
                        assertions of moral rights or attribution with respect to Your Content. By "use" we mean use, copy,
                        publicly perform and display, reproduce, distribute, modify, translate, remove, analyze, commercialize,
                        and prepare derivative works of Your Content.</p>
                    <h6>C. Ownership</h6>
                    <p>As between you and lifecarehub.com, you own Your Content. We own the lifecarehub.com Content,
                        including but not limited to visual interfaces, interactive features, graphics, design, compilation,
                        including, but not limited to, our compilation of User Content and other Site Content, source/computer
                        code, products, software, aggregate user review ratings, and all other elements and components of
                        the Site excluding Your Content, User Content and Third-Party Content. We also own the copyrights,
                        trademarks, service marks, trade names, and other intellectual and proprietary rights throughout the
                        world ("IP Rights") associated with the lifecarehub.com Content and the Site, which are protected by
                        copyright, trade dress, patent, trademark laws and all other applicable intellectual and proprietary
                        rights and laws. As such, you may not modify, reverse engineer, reproduce, distribute, create
                        derivative works or adaptations of, publicly display or in any way exploit any of the lifecarehub.com
                        Content in whole or in part except as expressly authorized by us. Except as expressly and
                        unambiguously provided herein, we do not grant you any express or implied rights, and all rights in
                        and to the Site and the lifecarehub.com Content are retained by us.</p>
                    <h6>D. Advertising</h6>
                    <p>Lifecarehub.com and its licensees may publicly display advertisements and other information adjacent
                        to or included with Your Content. You are not entitled to any compensation for such advertisements.
                        The manner, mode and extent of such advertising are subject to change without specific notice to
                        you. You are strictly prohibited from charging any end-user: -</p>
                    (a) a different price, under any pretexts or in any manner whatsoever, as advertised and promoted
                    on the Sites;<br>
                    (b) partly by way of cash, and partly by way of payment vide our online payment portal.
                    E. Other<br>
                    <p>User Content (including any that may have been created by users employed or contracted by
                        lifecarehub.com) does not necessarily reflect the opinion of lifecarehub.com. We reserve the right to
                        remove, screen, edit, or reinstate User Content from time to time at our sole discretion for any reason
                        or no reason, and without notice to you. For example, we may remove a review if we believe it
                        violates our Content Guidelines. We have no obligation to retain or provide you with copies of Your
                        Content, nor do we guarantee any confidentiality with respect to Your Content.</p>
                    <h5>5. Permitted Uses</h5>
                    <p>The Sites are designed to offer users purchasing with suppliers ("Suppliers"), which may include a
                        discount. You agree not to use the Sites in any manner that could damage, disable, overburden, or
                        impair any server, or the network(s) connected to any lifecarehub.com' server, or interfere with any
                        other party's use and enjoyment of the Sites. You may not attempt to gain unauthorized access to any
                        portion of the Sites, other accounts, computer systems, or networks connected to any
                        lifecarehub.com' server, through hacking, password or data mining, or any other means. You may not
                        obtain or attempt to obtain any materials or information through any means not intentionally made
                        available to you on the Sites. You will not link to any part of the Sites if such activity is illegal, will
                        cause damage to, or will otherwise harm lifecarehub.com or any other party. Moreover,
                        lifecarehub.com reserves the right in its sole discretion to disable or otherwise terminate your use of
                        the Sites, or any links you make to the Sites, or request you to do the same. Lifecarehub.com
                        reserves all of its rights in the lifecarehub.com Sites not expressly granted to you by these Terms of
                        Service.</p>
                    <h5>6. Your Conduct on Lifecarehub.com Sites</h5>
                    <p>Lifecarehub.com Sites is private property and fully owned by E-LIFECARE SDN BHD. All interactions
                        on this Site must be lawful and must comply with these Terms of Service. To the extent your conduct
                        (as judged by us in our sole discretion), restricts or inhibits any other user from using or enjoying any
                        part of this Site, we may limit your privileges on the Site, suspend or terminate your use of the Site
                        and seek other remedies.
                        PLEASE DO NOT ENGAGE IN ANY OF THE FOLLOWING ACTIVITIES, as they are prohibited
                        on the Site and constitute express violations of this Agreement. failing which, you shall be held liable
                        and accountable on such actions:</p>
                    • Submitting any purposely inaccurate information, committing fraud or falsifying information in
                    connection with your lifecarehub.com account or in order to create multiple lifecarehub.com
                    accounts.<br>
                    • Attempting to access, or actually accessing, data not intended for you, such as logging into a
                    server or an account which you are not authorized to access.
                    • Attempting to scan or test the security or configuration of the Site or to breach security or
                    authentication measures.<br>
                    • Tampering or interfering with the proper functioning of any part, page or area of the Site or
                    any functions or services provided by lifecarehub.com.<br>
                    • Attempting to interfere with service to any user in any manner, including, without limitation, by
                    means of submitting a virus to our Site, or attempts at overloading, "flooding", "spamming",
                    "mail bombing" or "crashing" the Site.<br>
                    • Using frames, framing techniques, or framing technology to enclose any content included on
                    the Site without our express written permission.<br>
                    • Using any Site content in any meta tags or any other “hidden text” techniques or technologies
                    without our express written permission.<br>
                    • Using the Site or any of its contents to advertise or solicit, for any other commercial, political,
                    or religious purpose, or to compete, directly or indirectly with lifecarehub.com.<br>
                    • Reselling or repurposing your access to the Site or any purchases made through the Site.<br>
                    • Using the Site or any of its resources to solicit Site End Users, Restaurants or other business
                    partners of lifecarehub.com to become users or partners of other online or offline services
                    directly or indirectly competitive or potentially competitive with lifecarehub.com, including
                    without limitation, aggregating current or previously offered deals;<br>
                    • Collecting content from the Site, including but not limited to current or previously offered
                    deals, and featuring such content to consumers in any manner that diverts traffic from the Site
                    without our express written permission.<br>
                    • Collecting the Personal Information, Statements, data, or content of any Site End Users.
                    • Using any End User(s), Merchants (s) information from the Site for any commercial purpose,
                    including, but not limited to, marketing.<br>
                    • Accessing, monitoring or copying any content or information from this Site using any "robot,"
                    "spider," "scraper" or other automated means or any manual process for any purpose without
                    our express written permission.<br>
                    • Violating the restrictions in any robot exclusion headers on this Site or bypassing or
                    circumventing other measures employed to prevent or limit access to this Site.<br>
                    • Taking any action that places excessive demand on our services, or imposes, or may impose
                    an unreasonable or disproportionately large load on our servers or other portion of our
                    infrastructure (as determined in our sole discretion).<br>
                    • Aggregating any live or post-feature content or other information from the Site (whether using
                    links or other technical means or physical records associated with purchases made through
                    this Site) with material from other sites or on a secondary site without our express written
                    permission.<br>
                    • Deep-linking to any portion of this Site (including, without limitation, the purchase path for any
                    voucher) without our express written permission;<br>
                    • Acting illegally or maliciously against the business interests or reputation of lifecarehub.com,
                    our Merchants or our services; or<br>
                    • Hyperlinking to the Site from any other website without our initial and ongoing consent.<br>
                    <h5>7. Return & Refund Policy</h5>
                    <p>In the event the order is canceled by you prior to the delivery of the goods and products, we may
                        charge you a cancellation fee at 3% of the refund amount and thereafter remit the balance of the
                        refund amount to you.
                        For the avoidance of doubt, you are not allowed to cancel the order if the goods are on delivery to
                        you, UNLESS it is due to errors on the supplier’s end, any refunds/exchanges will not be entertained
                        by us. Such costs that arise from the return & refund policy shall be borne by the supplier. In the
                        circumstances surrounding refunds/exchanges on damaged/defective/expired/incorrect delivery/late
                        delivery of goods, the supplier shall at its own discretion to either :<br>
                        ⚫ Provide replacement product that matches the original order; or<br>
                        ⚫ Provide substitute products, if necessary, as accepted by the buyer; or<br>
                        ⚫ Refund buyer in full value<br>
                        What you need to apply for a refund:<br>
                        ⚫ Proof of purchase (Order No, Invoice, Quotation, Receipt, Photo Snapshots); and <br>
                        ⚫ Reason for refund/replacement</p>
                    <h5>8. Links to Other Websites/Mobile Sites</h5>
                    <p>The Sites may contain advertisements and/or links to other sites ("Third Party Sites"). These links are
                        provided solely for the convenience of the users. Lifecarehub.com does not endorse, sanction or
                        verify the accuracy or ownership of the information contained in the advertisements or the content of
                        any Third Party Sites or any products or services advertised on Third Party Sites.
                        If you decide to leave the Sites and navigate to Third Party Sites, or install any applications,
                        software or download content from any such websites or mobile sites, you do so at your own risk.
                        Once you access a Third Party Site through a link on the lifecarehub.com Sites, you may no longer be
                        protected by these Terms of Service and you may be subject to the terms of service and other
                        conditions of such Third Party Sites. You should review the applicable terms and policies, including
                        privacy and data gathering practices, of any such site to which you navigate to from the
                        lifecarehub.com Sites, or relating to any applications you use or install from such Third Party Sites.
                        Concerns regarding a Third Party Site should be directed to the Third Party Site itself.
                        Lifecarehub.com bears no responsibility for any action associated with any Third Party Site.
                        Moreover, Lifecarehub.com does not imply an affiliation with any Third Party Site.</p>
                    <h5>9. Claim of Copyright Infringement</h5>
                    <p>Lifecarehub.com respects the intellectual property of others. If you believe in good faith that any Site
                        Content, or other matter posted on the Sites infringes the copyright in a work you own, please contact
                        us with correspondence containing the following:</p>
                    • A physical or electronic signature of the owner, or a person authorized to act on behalf of the
                    owner, of the copyright that is allegedly infringed.<br>
                    • Identification of the copyrighted work allegedly infringed.<br>
                    • Identifying information reasonably sufficient to allow determination by lifecarehub.com of the
                    location of the material that is allegedly infringing.<br>
                    • Information reasonably sufficient to permit lifecarehub.com to contact you;<br>
                    • A statement that you have a good faith belief that use of the material in the manner
                    complained of is not authorized by the copyright owner, its agent, or the law; and<br>
                    • A statement that the information in the notification is accurate, and under penalty of perjury,
                    that you are authorized to act on behalf of the owner of an exclusive right that is allegedly
                    infringed.<br>
                    <h5>10. Disclaimers and Limitations of Liability</h5>
                    <p>Please read this section carefully since it limits the liability of the lifecarehub.com entities to you. Each
                        of the subsections below only applies up to the maximum extent permitted under applicable law.
                        Nothing herein is intended to limit any rights you may have which may not be lawfully limited. If you
                        are unsure about this or any other section of these terms, please consult with a legal professional
                        prior to accessing or using the site. By accessing or using the Site, you represent that you have read,
                        understood, and agree to these terms, including this section. You are giving up substantial legal rights
                        by agreeing to these terms.
                        The Site is made available to you on an "as is", "with all faults" and "as available" basis, with the
                        express understanding that the lifecarehub.com entities may not monitor, control, or vet user content.
                        As such, your use of the Site is at your own discretion and risk. The lifecarehub.com entities make no
                        claims or promises about the quality, accuracy, or reliability of the site, its safety or security, or the site
                        content. Accordingly, the lifecarehub.com entities are not liable to you for any loss or damage that
                        might arise, for example, from the Site's inoperability, unavailability or security vulnerabilities or from
                        your reliance on the quality, accuracy, or reliability of the business listings, ratings, reviews, metrics or
                        review filter found on, used on, or made available through the site.
                        Lifecarehub.com is a service provider and transaction handler between wholesale customers
                        (“Buyers”) & Suppliers ("Suppliers"). Lifecarehub.com is not the agent of any Supplier and takes no
                        responsibility for the services or products for which Supplier provides. Lifecarehub.com makes no
                        claims or promises with respect to any third party, such as Suppliers, businesses or advertisers listed
                        on the Site or the Site's Users. Accordingly, the lifecarehub.com entities are not liable to you for any
                        loss or damage that might arise from their actions or omissions, including, for example, if another user
                        or business misuses your content, identity, or personal information, or if you have a negative
                        experience with one of the Suppliers, businesses or advertisers listed or featured on the site. Your
                        purchase and use of products or services offered by third parties through the site is at your own
                        discretion and risk.
                        Lifecarehub.com entities expressly disclaim all warranties, whether express or implied, including
                        warranties as to the products or services offered by businesses listed on the Site, and implied
                        warranties of merchantability, fitness for a particular purpose, and non-infringement. No oral or written
                        information or advice provided to you by a representative of one of the lifecarehub.com entities shall
                        create a representation or warranty.
                        Your sole and exclusive right and remedy in case of dissatisfaction with the Site, related
                        services, or any other grievance shall be your termination and discontinuation of access to, or use of
                        the Site.
                        Lifecarehub.com entities' maximum aggregate liability to you for losses or damages that you
                        suffer in connection with the site, or these terms is limited to the lower of (i) the amount paid, if any, by
                        you to the lifecarehub.com entities in connection with the Site in the 12 months prior to the action
                        giving rise to liability, or (ii) RM 100.00.
                        Lifecarehub.com entities disclaim liability for any (i) indirect, special, incidental, punitive,
                        exemplary, reliance, or consequential damages, (ii) loss of profits, (iii) business interruption, (iv)
                        reputational harm, or (v) loss of information or data.
                        Lifecarehub.com has the right at any time to change, modify, correct, add to, discontinue, or
                        retire any aspect or feature of the Sites, including, but not limited to, hours of availability, equipment
                        needed for access or use, or the availability of the Sites (or any part thereof) on any particular device
                        or communications service. Lifecarehub.com has no obligation to provide you with notice of any such
                        changes, and lifecarehub.com is under no obligation to provide you with any support, error
                        corrections, updates, upgrades, bug fixes, and/or enhancements of the Sites.</p>
                    <h5>11. Indemnification</h5>
                    <p>You agree to defend, indemnify, and hold harmless lifecarehub.com from all liabilities, claims,
                        damages, losses, and expenses, including attorneys' fees that arise from your use of the Sites.
                        Lifecarehub.com reserves the right, at its own expense, to assume the exclusive defense and control
                        of any matter otherwise subject to indemnification by you, in which event you will cooperate with
                        lifecarehub.com in asserting any available defenses.
                        During use of the Sites, you may enter into correspondence with, sell or provide goods and/or
                        services to end-customers. Any such activity, and any terms, conditions, warranties or
                        representations associated with such activity, is solely between you and the end-customers or any
                        such other third party. We shall have no liability, obligation or responsibility for any such
                        correspondence, purchase, transaction or promotion between you and any such end-customers or
                        any such other third party. In no event we shall be responsible for any content, products or services
                        advertised, posted, offered or made available by you.
                        It is your sole responsibility in respect of the security of your account, including keeping in the strictest
                        confidence possible the password of your account. In the event your account is hacked, intruded, or
                        being used in any manner to your detriment or loss, we shall not be held liable for of the aforesaid
                        loss and you shall have no claim against us in respect of the foregoing.
                        You also acknowledge and agree that by posting your products, services and/or any related
                        information on the Sites, you may run the risk that your products, services and/or any related
                        information may be copied, plagiarized, reverse-engineered or manipulated in such manner to your
                        detriment. You shall hold us not liable and shall have no claim against us in whatsoever manner for
                        any loss or damage incurred by you in respect of the foregoing.</p>
                    <h5>12. Governing Law and Jurisdiction</h5>
                    <p>The terms and conditions as set out herein and any dispute or matter arising from or incidental to the
                        use of the Sites shall be governed by and construed in accordance with the laws of Malaysia. Any
                        dispute shall submit to the exclusive jurisdiction of the courts of Malaysia</p>
                    <h5>13. Termination</h5>
                    <p>You may terminate the Terms at any time by closing your account, discontinuing your use of the Site,
                        and providing lifecarehub.com with a notice of termination. Please review our Privacy Policy for
                        information about what we do with your account when terminated.
                        We may close your account, suspend your ability to use certain portions of the Site, and/or ban
                        you altogether from the Site for any or no reason, and without notice or liability of any kind. Any such
                        action could prevent you from accessing your account, the Site, Your Content, Site Content, or any
                        other related information.
                        In the event of any termination of these Terms, whether by you or us, Sections 1 - 13 will
                        continue in full force and effect, including our right to use Your Content as detailed in Section 4.</p>
                    <h5>14. General Terms</h5>
                    <p>We reserve the right to modify, update, or discontinue the Site at our sole discretion, at any time, for
                        any or no reason, and without notice or liability. We may provide you with notices, including those
                        regarding changes to the Terms by email, regular mail, or communications through the Site. Except
                        as otherwise stated in Section 10 above, nothing herein is intended, nor will be deemed, to confer
                        rights or remedies upon any third party.
                        The Terms contain the entire agreement between you and us regarding the use of the Site and
                        supersede any prior agreement between you and us on such subject matter. The parties
                        acknowledge that no reliance is placed on any representation made but not expressly contained in
                        these Terms. Any failure on lifecarehub.com's part to exercise or enforce any right or provision of the
                        Terms does not constitute a waiver of such right or provision. The failure of either party to exercise in
                        any respect any right provided for herein shall not be deemed a waiver of any further rights
                        hereunder. If any provision of the Terms is found to be unenforceable or invalid, then only that
                        provision shall be modified to reflect the parties' intention or eliminated to the minimum extent
                        necessary so that the Terms shall otherwise remain in full force and effect and enforceable. The
                        Terms, and any rights or obligations hereunder, are not assignable, transferable or sublicensable by
                        you except with lifecarehub.com's prior written consent but may be assigned or transferred by us
                        without restriction. Any attempted assignment by you shall violate these Terms and be void.
                        We may give notice by means of a general notice on the Sites, electronic mail to your email address
                        in our records, or by written communication sent by registered mail or pre-paid post to your address in
                        our record. You may give notice to us by letter sent by registered mail to us using the contact details
                        as provided in the App</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div
    <!--================Login Box Area =================-->
    <section class="login_box_area mt-4">

    <!--================Login Box Area =================-->
    <section class="login_box_area mt-4 d-none d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <div class="hover transparent-login-box">
                            <img src="{{asset('img/Screenshot_2023-02-27_140655-removebg-preview.png')}}" style="width: 150px;" class="img-responsive mb-2" alt="logo">
                            <h4 style="color:white">Love Earth, Use GreenQR</h4>
                            <a class="button button-account" href="{{ route('login') }}">Login Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner register_form_inner">
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

                        <h3 class="mb-3" STYLE="color:#1FA33D">CREATE AN ACCOUNT</h3>


                        <form class="row login_form" method="POST" action="{{ route('register') }}" id="register_form" >

                            @csrf

                            <input type="hidden" class="form-control" value="{{$code}}" name="code">
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="email" name="email" value="{{$email}}" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
                            </div>

                            <div hidden class="col-md-12 form-group">
                                <div class="creat_account mb-0">
                                    <input type="checkbox" id="f-option2" name="isvendor">
                                    <label for="f-option2">I’m a vendor</label>
                                </div>
                                <div class="creat_account mt-0">
                                    <input type="checkbox" id="terms_and_conditions" name="agreement" value="1" required>
                                    <label for="terms_and_conditions">I've read and agree with all</label>
                                    <label for="terms_and_conditions"><a href="#" data-toggle="modal" data-target="#exampleModalLong">Terms & Conditions</a></label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button style="background-color:#274439" type="submit" value="submit" href="login.html" class="button button-register w-100" id="submit_button">Register</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
	
	
	<!--================Mobile=================-->
	<section class="login_box_area mt-4 d-block d-sm-none">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6">
                    <div class="login_form_inner register_form_inner">
                        <h3 class="mb-3">Get Started</h3>


                        <form class="row login_form" method="POST" action="{{ route('register') }}" id="register_form" >

                            @csrf

                            <input type="hidden" class="form-control" value="{{$code}}" name="code">
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="email" name="email" value="{{$email}}" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="creat_account mb-0">
                                    <input type="checkbox" id="f-option2" name="isvendor">
                                    <label for="f-option2">I’m a vendor</label>
                                </div>
                                <div class="creat_account mt-0">
                                    <input type="checkbox" id="terms_and_conditions" name="agreement" value="1" required>
                                    <label for="terms_and_conditions">I've read and agree with all</label>
                                    <label for="terms_and_conditions"><a href="#" data-toggle="modal" data-target="#exampleModalLong">Terms & Conditions</a></label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" href="login.html" class="button button-register w-100" id="submit_button">Register</button>
                            </div>
                        </form>

                    </div>
                </div>
				<div class="col-lg-6">
                    <div class="login_box_img">
                        <div class="hover">
                            <img src="{{asset('img/Logo2.png')}}" style="width: 150px;" class="img-responsive mb-2" alt="logo">
                            <h4>Already have an account?</h4>
                            <p>One-stop Health and Wellness Online Marketplace​</p>
                            <a class="button button-account" href="{{ route('login') }}">Login Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->
@endsection

@section('script')
	<script>
		// Get the button
		let mybutton = document.getElementById("myBtn");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				mybutton.style.display = "block";
			} else {
			mybutton.style.display = "none";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>
@endsection