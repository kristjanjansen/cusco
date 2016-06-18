<template>

    <div class="Arc {{ isclasses }}">

        <svg :style="{ width: size + 'px', height: size + 'px' }">
        
            <path
                id="arc"
                fill="none"
                stroke="#446688"
                stroke-width="1" 
                :d="arc"
            />
      
        </svg>

    </div>

</template>

<script>

    import Component from '../Component';

    export default Component.extend({

        data() {

            return {
                arc: '',
                size: 50,
            }

        },

        ready() {

            this.arc = this.generateArc(25, 25, 25, 0, 90)
        
        },

        methods: {

            polarToCartesian: function(centerX, centerY, radius, angleInDegrees) {
              var angleInRadians = (angleInDegrees-90) * Math.PI / 180.0;

              return {
                x: centerX + (radius * Math.cos(angleInRadians)),
                y: centerY + (radius * Math.sin(angleInRadians))
              };
            },

            generateArc: function(x, y, radius, startAngle, endAngle) {

                var start = this.polarToCartesian(x, y, radius, endAngle);
                var end = this.polarToCartesian(x, y, radius, startAngle);

                var arcSweep = endAngle - startAngle <= 180 ? "0" : "1";

                var d = [
                    "M", start.x, start.y, 
                    "A", radius, radius, 0, arcSweep, 0, end.x, end.y
                ].join(" ");

                return d;       
            
            }

        }
   
    })

</script>