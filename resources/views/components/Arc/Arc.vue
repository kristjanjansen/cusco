<template>

    <div class="Arc" :class="isclasses">

        <svg :style="{ width: size + 'px', height: size + 'px' }">
        
            <path
                fill="none"
                :stroke="color"
                :stroke-width="border" 
                :d="arc"
            />
      
        </svg>

    </div>

</template>

<script>

    export default {

        props: {
            isclasses: { default: ''},
            size: { default: 50 },
            border: { default: 4 },
            color: { default: 'black' },
            endangle: { default: 270 }
        },

        data() {

            return {
                arc: '',
                startangle: 0,
            }

        },

        ready() {

            this.arc = this.generateArc(
                this.size / 2,
                this.size / 2,
                this.size / 2 - (this.border / 2),
                this.startangle,
                this.endangle
            )
        
        },

        methods: {

            // From http://stackoverflow.com/questions/5736398/how-to-calculate-the-svg-path-for-an-arc-of-a-circle

            polarToCartesian: function(centerX, centerY, radius, angleInDegrees) {
              
                var angleInRadians = (angleInDegrees-90) * Math.PI / 180.0

                return {
                    x: centerX + (radius * Math.cos(angleInRadians)),
                    y: centerY + (radius * Math.sin(angleInRadians))
                }
            
            },

            generateArc: function(x, y, radius, startAngle, endAngle) {

                endAngle = endAngle - 0.001

                var start = this.polarToCartesian(x, y, radius, endAngle)
                var end = this.polarToCartesian(x, y, radius, startAngle)

                var arcSweep = endAngle - startAngle <= 180 ? "0" : "1";

                var d = [
                    "M", start.x, start.y, 
                    "A", radius, radius, 0, arcSweep, 0, end.x, end.y
                ].join(" ");

                return d;       
            
            }

        }
   
    }

</script>