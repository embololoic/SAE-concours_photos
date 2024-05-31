<?php require('./views/blocks/header.php')?>
<div id="bandeau">
    <h2 class="titre">IUT CHATELLERAULT</h2>
    <h4 class="titre-2">Université de Poitiers - IUT Poitiers-Niort-Châtellerault</h4>
</div>
<article id="welcome-text">
    <h2>CONCOURS PHOTO</h2>
    <div class="paragraph-container">
    <i class="fas fa-caret-right"></i><p>Bienvenue au Concours Photo "Châtellerault sous tous ses angles" !</p>
    </div>
    <div class="paragraph-container">
    <i class="fas fa-caret-right"></i><p>Découvrez la magie de Châtellerault à travers l'objectif de votre appareil photo !</p>
    </div>
    <div class="paragraph-container">
    <i class="fas fa-caret-right"></i><p>Notre concours vous invite à explorer la diversité de la ville sous des perspectives uniques. Que vous capturiez des scènes de vie de quartier, l'architecture emblématique ou des instants quotidiens, chaque photo est une chance de montrer votre talent!</p>
    </div>
    <span class="attention-span">VOUS ATTENDEZ QUOI? PARTICIPEZ MAINTENANT : </span>
</article>
<div class="part-btn-container">
    <button class="participate-btn" onclick="location.href='?route=upload'">>>Participer<<</button></div>
</div>
<div class="div-page">
    <p>COMMENT PARTICIPER :</p>
<ol class="instructions">
   <li><p>INSCRIVEZ-VOUS AVEC VOTRE IDENTIFIANT ETUDIANT POUR OBTENIR ACCÈS EXCLUSIF</p></li>
   <li><p>UTILISEZ LE QR CODE OU LE LIEN URL POUR ACCÉDER À LA PLATEFORME DE DÉPÔT DES PHOTOS</p></li>
   <li><p>SOUMETTEZ VOTRE MEILLEURE PHOTO DE CHÂTELLERAULT EN RESPECTANT LE THÉME</p></li>
   <li><p>AJOUTER UN TITRE CAPTIVANT À VOTRE ŒUVRE POUR LA METTRE EN VALEUR</p></li>
</ol></div>

<div class="div-page"><p>PRIX À REMPORTER :</p>
<ol>
   <li><p>1ER PRIX : 100 EUROS</p></li>
   <li><p>2ÈME PRIX : 80 EUROS</p></li>
   <li><p>3ÈME PRIX : 80 EUROS</p></li>
</ol>
</div>
<section id="links">
    <h3>Contact :</h3>
    <a href="http://www.instagram.com/">
        <i class="fab fa-instagram"></i>
    </a>

    <a href="tel:123-456-7890">
        <i class="fa fa-phone"></i>
    </a>
</section>

<?php 

require('./views/blocks/footer.php');
