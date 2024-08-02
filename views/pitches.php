<div id="pitches">
    <h1>Our pitches</h1>
    <div class="container">
        <?php 
            require_once ("controllers/pitches.php");
            $pitches = new PitchesController();
            $allpitches = $pitches->getAll();
            foreach ($allpitches as $pitch) { ?> 
            
            <div class="pitch">
                <h2> <?php echo $pitch['name'] ;?> </h2>
                <img src="<?php echo $pitch['img']; ?>" alt="">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam corrupti voluptatum sunt, accusamus eum consectetur voluptas ipsum veniam excepturi numquam?</p>
            </div>

            <?php
                
            }
        ?>
        
    </div>
</div>