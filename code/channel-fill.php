<?php 
$title = "Serveur - Discord";
session_start();
if (empty($_SESSION["is_logged_in"]) || !$_SESSION["is_logged_in"]) {
    header("Location: connexion.php");
    exit();
}
ob_start();
?>
<main>
    <div class="top-bar">
        <div class="friend-username">
            <img src="https://placehold.co/24" alt="friend-avatar" class="profile-picture">
            <p class="gg-semibold">Nom du channel</p>
        </div>
        <div class="friend-options">
            <svg xmlns="http://www.w3.org/2000/svg" x="0" y="0" class="icon__9293f" aria-hidden="true" role="img" width="18" height="18" fill="none" viewBox="0 0 24 24" color="#94959C"><path d="M12 2.81a1 1 0 0 1 0-1.41l.36-.36a1 1 0 0 1 1.41 0l9.2 9.2a1 1 0 0 1 0 1.4l-.7.7a1 1 0 0 1-1.3.13l-9.54-6.72a1 1 0 0 1-.08-1.58l1-1L12 2.8ZM12 21.2a1 1 0 0 1 0 1.41l-.35.35a1 1 0 0 1-1.41 0l-9.2-9.19a1 1 0 0 1 0-1.41l.7-.7a1 1 0 0 1 1.3-.12l9.54 6.72a1 1 0 0 1 .07 1.58l-1 1 .35.36ZM15.66 16.8a1 1 0 0 1-1.38.28l-8.49-5.66A1 1 0 1 1 6.9 9.76l8.49 5.65a1 1 0 0 1 .27 1.39ZM17.1 14.25a1 1 0 1 0 1.11-1.66L9.73 6.93a1 1 0 0 0-1.11 1.66l8.49 5.66Z" fill="currentColor" class=""/></svg>          
            <svg xmlns="http://www.w3.org/2000/svg" x="0" y="0" class="icon__9293f" aria-hidden="true" role="img" width="18" height="18" fill="none" viewBox="0 0 24 24" color="#94959C"><path fill="currentColor" d="M4 4a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h11a3 3 0 0 0 3-3v-2.12a1 1 0 0 0 .55.9l3 1.5a1 1 0 0 0 1.45-.9V7.62a1 1 0 0 0-1.45-.9l-3 1.5a1 1 0 0 0-.55.9V7a3 3 0 0 0-3-3H4Z" class=""/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" x="0" y="0" class="icon__9293f" aria-hidden="true" role="img" width="18" height="18" fill="none" viewBox="0 0 24 24" color="#94959C"><path fill="currentColor" d="M14.5 8a3 3 0 1 0-2.7-4.3c-.2.4.06.86.44 1.12a5 5 0 0 1 2.14 3.08c.01.06.06.1.12.1ZM18.44 17.27c.15.43.54.73 1 .73h1.06c.83 0 1.5-.67 1.5-1.5a7.5 7.5 0 0 0-6.5-7.43c-.55-.08-.99.38-1.1.92-.06.3-.15.6-.26.87-.23.58-.05 1.3.47 1.63a9.53 9.53 0 0 1 3.83 4.78ZM12.5 9a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM2 20.5a7.5 7.5 0 0 1 15 0c0 .83-.67 1.5-1.5 1.5a.2.2 0 0 1-.2-.16c-.2-.96-.56-1.87-.88-2.54-.1-.23-.42-.15-.42.1v2.1a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2.1c0-.25-.31-.33-.42-.1-.32.67-.67 1.58-.88 2.54a.2.2 0 0 1-.2.16A1.5 1.5 0 0 1 2 20.5Z" class=""/></svg>            <div class="friend-search-bar">
                <input class="search-bar" type="search" name="friend_search_bar" id="friend_search_bar" placeholder="Rechercher">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon_fea832 visible_fea832" aria-hidden="true" role="img" width="18" height="18" fill="none" viewBox="0 0 24 24" color="#94959C"><path fill="currentColor" fill-rule="evenodd" d="M15.62 17.03a9 9 0 1 1 1.41-1.41l4.68 4.67a1 1 0 0 1-1.42 1.42l-4.67-4.68ZM17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" clip-rule="evenodd" class=""/></svg>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" x="0" y="0" class="icon__9293f" aria-hidden="true" role="img" width="18" height="18" fill="none" viewBox="0 0 24 24" color="#94959C"><path fill="currentColor" fill-rule="evenodd" d="M5 2a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3H5ZM4 5.5C4 4.67 4.67 4 5.5 4h13c.83 0 1.5.67 1.5 1.5v6c0 .83-.67 1.5-1.5 1.5h-2.65c-.5 0-.85.5-.85 1a3 3 0 1 1-6 0c0-.5-.35-1-.85-1H5.5A1.5 1.5 0 0 1 4 11.5v-6Z" clip-rule="evenodd" class=""/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" x="0" y="0" class="icon__9293f" aria-hidden="true" role="img" width="18" height="18" fill="none" viewBox="0 0 24 24" color="#94959C"><circle cx="12" cy="12" r="10" fill="transparent" class=""/><path fill="currentColor" fill-rule="evenodd" d="M12 23a11 11 0 1 0 0-22 11 11 0 0 0 0 22Zm-.28-16c-.98 0-1.81.47-2.27 1.14A1 1 0 1 1 7.8 7.01 4.73 4.73 0 0 1 11.72 5c2.5 0 4.65 1.88 4.65 4.38 0 2.1-1.54 3.77-3.52 4.24l.14 1a1 1 0 0 1-1.98.27l-.28-2a1 1 0 0 1 .99-1.14c1.54 0 2.65-1.14 2.65-2.38 0-1.23-1.1-2.37-2.65-2.37ZM13 17.88a1.13 1.13 0 1 1-2.25 0 1.13 1.13 0 0 1 2.25 0Z" clip-rule="evenodd" class=""/></svg>
        </div>
    </div>
    <div class="message-fill">
        <div class="messages">
            <div class="separator">
                <div class="separator-line"></div>
                <div class="separator-date"><p>25 mars 2025</p></div>
                <div class="separator-line"></div>
            </div>
            <div class="message-1">
                <div class="friend-pseudo">
                    <img src="https://placehold.co/32" alt="friend-avatar" class="profile-picture">
                    <div class="sender-infos">
                        <p class="gg-semibold sender-username">Username</p>
                        <p class="gg-medium message-date-hour">25/03/2025 13:53</p>
                        <br>
                        <p class="gg-regular message-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, atque. Ab, repellendus? Enim et culpa nemo provident eum voluptatum, aliquam maxime quae quibusdam autem cumque deserunt magnam quod ad sequi!</p>
                    </div>
                </div>
            </div>
            <div class="message-2">
                <div class="self-pseudo">
                    <img src="https://placehold.co/32" alt="self-avatar" class="profile-picture">
                    <div class="sender-infos">
                        <p class="gg-semibold sender-username">Username 2</p>
                        <p class="gg-medium message-date-hour">25/03/2025 13:57</p>
                        <br>
                        <p class="gg-regular message-content">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi, facere. Similique id delectus incidunt quia vel voluptatibus eligendi reiciendis saepe blanditiis enim mollitia, maxime, ex in. Repellat distinctio laudantium debitis.</p>
                    </div>
                </div>
            </div>
            <div class="message-3">
                <div class="friend-pseudo">
                    <img src="https://placehold.co/32" alt="friend-avatar" class="profile-picture">
                    <div class="sender-infos">
                        <p class="gg-semibold sender-username">Username</p>
                        <p class="gg-medium message-date-hour">25/03/2025 14:03</p>
                        <br>
                        <p class="gg-regular message-content">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi, facere. Similique id delectus incidunt quia vel voluptatibus eligendi reiciendis saepe blanditiis enim mollitia, maxime, ex in. Repellat distinctio laudantium debitis.</p>
                    </div>
                </div>
            </div>
            <div class="separator">
                <div class="separator-line"></div>
                <div class="separator-date"><p>27 mars 2025</p></div>
                <div class="separator-line"></div>
            </div>            
            <div class="message-4">
                <div class="self-pseudo">
                    <img src="https://placehold.co/32" alt="self-avatar" class="profile-picture">
                    <div class="sender-infos">
                        <p class="gg-semibold sender-username">Username 2</p>
                        <p class="gg-medium message-date-hour">27/03/2025 19:27</p>
                        <br>
                        <p class="gg-regular message-content">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi, facere. Similique id delectus incidunt quia vel voluptatibus eligendi reiciendis saepe blanditiis enim mollitia, maxime, ex in. Repellat distinctio laudantium debitis.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="send-message">
        <svg xmlns="http://www.w3.org/2000/svg" class="circleIcon__5bc7e" aria-hidden="true" role="img" width="18" height="18" fill="none" viewBox="0 0 24 24" color="#94959C"><circle cx="12" cy="12" r="10" fill="transparent" class=""/><path fill="currentColor" fill-rule="evenodd" d="M12 23a11 11 0 1 0 0-22 11 11 0 0 0 0 22Zm0-17a1 1 0 0 1 1 1v4h4a1 1 0 1 1 0 2h-4v4a1 1 0 1 1-2 0v-4H7a1 1 0 1 1 0-2h4V7a1 1 0 0 1 1-1Z" clip-rule="evenodd" class=""/></svg>
            <input type="text" name="send_message" id="send_message" placeholder="Envoyer un message à cet ami">
            <div class="message-options">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" style="color: #94959C;">
                    <g clip-path="url(#__lottie_element_1718)">
                      <g opacity="1" transform="matrix(0.04,0,0,0.04,0,0)" clip-path="url(#__lottie_element_1720)">
                        <g transform="matrix(25,0,0,25,300,300)" opacity="1">
                          <path fill="currentColor" d="M-7,10 C-8.105,10 -9,9.105 -9,8 C-9,8 -9,2.5 -9,2.5 C-9,2.224 -8.776,2 -8.5,2 C-8.5,2 -1.5,2 -1.5,2 C-1.224,2 -1,2.224 -1,2.5 C-1,2.5 -1,9.5 -1,9.5 C-1,9.776 -1.224,10 -1.5,10 C-1.5,10 -7,10 -7,10z M1,9.5 C1,9.776 1.224,10 1.5,10 C1.5,10 7,10 7,10 C8.105,10 9,9.105 9,8 C9,8 9,2.5 9,2.5 C9,2.224 8.776,2 8.5,2 C8.5,2 1.5,2 1.5,2 C1.224,2 1,2.224 1,2.5 C1,2.5 1,9.5 1,9.5z"/>
                        </g>
                        <g transform="matrix(25,0,0,25,300,300)" opacity="1">
                          <path fill="currentColor" d="M-10,-2 C-10,-3.105 -9.105,-4 -8,-4 C-8,-4 8,-4 8,-4 C9.105,-4 10,-3.105 10,-2 C10,-2 10,-0.5 10,-0.5 C10,-0.224 9.776,0 9.5,0 C9.5,0 -9.5,0 -9.5,0 C-9.776,0 -10,-0.224 -10,-0.5 C-10,-0.5 -10,-2 -10,-2z"/>
                        </g>
                        <g transform="matrix(25,0,0,25,300,300)" opacity="1">
                          <path stroke="currentColor" fill="none" stroke-width="2" d="M7,-6 C7,-7.657 5.657,-9 4,-9 C4,-9 3.911,-9 3.911,-9 C2.494,-9 1.259,-8.036 0.915,-6.661 C0.915,-6.661 0,-3 0,-3 C0,-3 4,-3 4,-3 C5.657,-3 7,-4.343 7,-6 C7,-6 7,-6 7,-6z"/>
                        </g>
                        <g transform="matrix(25,0,0,25,300,300)" opacity="1">
                          <path stroke="currentColor" fill="none" stroke-width="2" d="M-7,-6 C-7,-7.657 -5.657,-9 -4,-9 C-4,-9 -3.911,-9 -3.911,-9 C-2.494,-9 -1.259,-8.036 -0.915,-6.661 C-0.915,-6.661 0,-3 0,-3 C0,-3 -4,-3 -4,-3 C-5.657,-3 -7,-4.343 -7,-6 C-7,-6 -7,-6 -7,-6z"/>
                        </g>
                      </g>
                    </g>
                  </svg>
                <svg width="18px" height="18px" viewBox="0 0 24.00 24.00" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools --> <title>ic_fluent_gif_24_filled</title> <desc>Created with Sketch.</desc> <g id="🔍-Product-Icons" stroke-width="0.00024000000000000003" fill="none" fill-rule="evenodd"> <g id="ic_fluent_gif_24_filled" fill="#94959C" fill-rule="nonzero"> <path d="M18.75,3.50054297 C20.5449254,3.50054297 22,4.95561754 22,6.75054297 L22,17.2531195 C22,19.048045 20.5449254,20.5031195 18.75,20.5031195 L5.25,20.5031195 C3.45507456,20.5031195 2,19.048045 2,17.2531195 L2,6.75054297 C2,4.95561754 3.45507456,3.50054297 5.25,3.50054297 L18.75,3.50054297 Z M8.01459972,8.87193666 C6.38839145,8.87193666 5.26103525,10.2816525 5.26103525,11.9943017 C5.26103525,13.707564 6.38857781,15.1202789 8.01459972,15.1202789 C8.90237918,15.1202789 9.71768065,14.6931811 10.1262731,13.9063503 L10.2024697,13.7442077 L10.226,13.674543 L10.2440163,13.5999276 L10.2440163,13.5999276 L10.2516169,13.5169334 L10.2518215,11.9961937 L10.2450448,11.9038358 C10.2053646,11.6359388 9.99569349,11.4234501 9.72919932,11.3795378 L9.62682145,11.3711937 L8.62521827,11.3711937 L8.53286035,11.3779703 C8.26496328,11.4176506 8.05247466,11.6273217 8.00856234,11.8938159 L8.00021827,11.9961937 L8.00699487,12.0885517 C8.0466751,12.3564487 8.25634623,12.5689373 8.5228404,12.6128497 L8.62521827,12.6211937 L9.00103525,12.6209367 L9.00103525,13.3549367 L8.99484486,13.3695045 C8.80607251,13.6904125 8.44322427,13.8702789 8.01459972,13.8702789 C7.14873038,13.8702789 6.51103525,13.0713011 6.51103525,11.9943017 C6.51103525,10.9182985 7.14788947,10.1219367 8.01459972,10.1219367 C8.43601415,10.1219367 8.67582824,10.1681491 8.97565738,10.3121334 C9.28681641,10.4615586 9.6601937,10.3304474 9.80961888,10.0192884 C9.95904407,9.70812933 9.82793289,9.33475204 9.51677386,9.18532686 C9.03352891,8.95326234 8.61149825,8.87193666 8.01459972,8.87193666 Z M12.6289445,8.99393497 C12.3151463,8.99393497 12.0553614,9.22519285 12.0107211,9.52657705 L12.0039445,9.61893497 L12.0039445,14.381065 L12.0107211,14.4734229 C12.0553614,14.7748072 12.3151463,15.006065 12.6289445,15.006065 C12.9427427,15.006065 13.2025276,14.7748072 13.2471679,14.4734229 L13.2539445,14.381065 L13.2539445,9.61893497 L13.2471679,9.52657705 C13.2025276,9.22519285 12.9427427,8.99393497 12.6289445,8.99393497 Z M17.6221579,9.00083497 L15.6247564,8.99393111 C15.3109601,8.99285493 15.0503782,9.22321481 15.0046948,9.52444312 L14.9975984,9.61677709 L14.9975984,14.3649711 L15.0043751,14.4573291 C15.0440553,14.7252261 15.2537265,14.9377148 15.5202206,14.9816271 L15.6225985,14.9899711 L15.7149564,14.9831945 C15.9828535,14.9435143 16.1953421,14.7338432 16.2392544,14.467349 L16.2475985,14.3649711 L16.2470353,13.2499367 L17.37,13.2504012 L17.4623579,13.2436246 C17.730255,13.2039444 17.9427436,12.9942732 17.9866559,12.7277791 L17.995,12.6254012 L17.9882234,12.5330433 C17.9485432,12.2651462 17.738872,12.0526576 17.4723779,12.0087453 L17.37,12.0004012 L16.2470353,11.9999367 L16.2470353,10.2449367 L17.6178421,10.2508313 L17.7102229,10.2443727 C18.0117595,10.2007704 18.2439132,9.94178541 18.2450039,9.62798912 C18.24608,9.31419284 18.0157202,9.05361096 17.7144919,9.00793041 L17.6221579,9.00083497 L15.6247564,8.99393111 L17.6221579,9.00083497 Z" id="🎨-Color"> </path> </g> </g> </g></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 12 12"><path fill="#94959C" d="M3 1h6a2 2 0 0 1 2 2v3H8c-.725 0-1.36.385-1.71.962a.9.9 0 0 1-.294.048c-.318 0-.572-.157-.768-.353a1.8 1.8 0 0 1-.281-.37a.5.5 0 0 0-.894.447v.002l.002.001l.002.005l.008.015a2 2 0 0 0 .113.187c.075.114.19.266.343.42c.303.304.797.646 1.475.646H6V11H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2m1.5 4a.5.5 0 1 0 0-1a.5.5 0 0 0 0 1m3 0a.5.5 0 1 0 0-1a.5.5 0 0 0 0 1M11 7H8a1 1 0 0 0-1 1v3h.5a.5.5 0 0 0 .354-.146l3-3A.5.5 0 0 0 11 7.5z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="#94959C" d="M22.002 12.002C22.002 6.478 17.524 2 12 2S2 6.478 2 12.002c0 5.523 4.477 10.001 10.001 10.001s10.002-4.478 10.002-10.001m-14.25-2a1.25 1.25 0 1 1 2.498 0a1.25 1.25 0 0 1-2.499 0m6 0a1.25 1.25 0 1 1 2.498 0a1.25 1.25 0 0 1-2.499 0m-3.616 5.106c.483.29 1.155.455 1.864.455s1.381-.165 1.864-.455a.75.75 0 1 1 .772 1.286c-.767.46-1.72.67-2.636.67s-1.869-.21-2.636-.67a.75.75 0 1 1 .772-1.286"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 14 14"><path fill="#94959C" fill-rule="evenodd" d="M1.203 5.169L.784 8.94a2.305 2.305 0 0 0 4.353 1.286L5.5 9.5h3l.363.726a2.305 2.305 0 0 0 4.353-1.286l-.42-3.771A3 3 0 0 0 9.816 2.5h-5.63a3 3 0 0 0-2.982 2.669Zm3.172-.794c.345 0 .625.28.625.625v.542h.542a.625.625 0 1 1 0 1.25H5v.541a.625.625 0 1 1-1.25 0v-.541h-.542a.625.625 0 1 1 0-1.25h.542V5c0-.345.28-.625.625-.625m4.89 3.042a.625.625 0 1 0 0-1.25a.625.625 0 0 0 0 1.25m1.876-2.175a.625.625 0 1 1-1.25 0a.625.625 0 0 1 1.25 0" clip-rule="evenodd"/></svg>
                    <g clip-path="url(#__lottie_element_1718)">
                      <g opacity="1" transform="matrix(0.04,0,0,0.04,0,0)" clip-path="url(#__lottie_element_1720)">
                        <g transform="matrix(25,0,0,25,300,300)" opacity="1">
                          <path fill="currentColor" d="M-7,10 C-8.105,10 -9,9.105 -9,8 C-9,8 -9,2.5 -9,2.5 C-9,2.224 -8.776,2 -8.5,2 C-8.5,2 -1.5,2 -1.5,2 C-1.224,2 -1,2.224 -1,2.5 C-1,2.5 -1,9.5 -1,9.5 C-1,9.776 -1.224,10 -1.5,10 C-1.5,10 -7,10 -7,10z M1,9.5 C1,9.776 1.224,10 1.5,10 C1.5,10 7,10 7,10 C8.105,10 9,9.105 9,8 C9,8 9,2.5 9,2.5 C9,2.224 8.776,2 8.5,2 C8.5,2 1.5,2 1.5,2 C1.224,2 1,2.224 1,2.5 C1,2.5 1,9.5 1,9.5z"/>
                        </g>
                        <g transform="matrix(25,0,0,25,300,300)" opacity="1">
                          <path fill="currentColor" d="M-10,-2 C-10,-3.105 -9.105,-4 -8,-4 C-8,-4 8,-4 8,-4 C9.105,-4 10,-3.105 10,-2 C10,-2 10,-0.5 10,-0.5 C10,-0.224 9.776,0 9.5,0 C9.5,0 -9.5,0 -9.5,0 C-9.776,0 -10,-0.224 -10,-0.5 C-10,-0.5 -10,-2 -10,-2z"/>
                        </g>
                        <g transform="matrix(25,0,0,25,300,300)" opacity="1">
                          <path stroke="currentColor" fill="none" stroke-width="2" d="M7,-6 C7,-7.657 5.657,-9 4,-9 C4,-9 3.911,-9 3.911,-9 C2.494,-9 1.259,-8.036 0.915,-6.661 C0.915,-6.661 0,-3 0,-3 C0,-3 4,-3 4,-3 C5.657,-3 7,-4.343 7,-6 C7,-6 7,-6 7,-6z"/>
                        </g>
                        <g transform="matrix(25,0,0,25,300,300)" opacity="1">
                          <path stroke="currentColor" fill="none" stroke-width="2" d="M-7,-6 C-7,-7.657 -5.657,-9 -4,-9 C-4,-9 -3.911,-9 -3.911,-9 C-2.494,-9 -1.259,-8.036 -0.915,-6.661 C-0.915,-6.661 0,-3 0,-3 C0,-3 -4,-3 -4,-3 C-5.657,-3 -7,-4.343 -7,-6 C-7,-6 -7,-6 -7,-6z"/>
                        </g>
                      </g>
                    </g>
                  </svg>
            </div>
        </div>
    </div>
</main>

<?php
$content = ob_get_clean();
include(dirname(__DIR__) . DIRECTORY_SEPARATOR . "code" . DIRECTORY_SEPARATOR . "template_server.php");
?>