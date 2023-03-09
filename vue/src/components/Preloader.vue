<template>
	<transition name="fade">
		<div class="preloader">
			<div class="logo">
                <img src="../assets/logo.svg" alt="Логотип образовательной платформы.">
            </div>
			<div class="circles">
				<div class="circle"></div>
				<div class="circle"></div>
				<div class="circle"></div>
				<div class="circle"></div>
				<div class="circle"></div>
			</div>
		</div>
	</transition>
</template>

<script>
    export default {
	name: 'preloader',
	data(){
		return {
		}
	},
	mounted(){

	},
	methods: {

	}
}

</script>
<style>

.preloader {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: white;
  z-index: 9999;
  overflow: hidden;
}

.preloader .circles {
    display: flex;
    margin-top: 1rem;
}
.preloader .circles .circle {
    width: 15px;
    height: 15px;
    margin: 5px;
    background: linear-gradient(96deg, rgba(99,102,241,1) 0%, rgba(129,140,248,1) 100%);
    border-radius: 50%;
    animation-name: scaleIn;
    animation-duration: .7s;
    animation-iteration-count: infinite;
    animation-direction: alternate;
    transform: scale(0);
}
.preloader .circles .circle:nth-child(1) {
    animation-delay: 0s;
}
.preloader .circles .circle:nth-child(2) {
    animation-delay: .05s;
}
.preloader .circles .circle:nth-child(3) {
    animation-delay: .1s;
}
.preloader .circles .circle:nth-child(4) {
    animation-delay: .15s;
}
.preloader .circles .circle:nth-child(5) {
    animation-delay: .2s;
 }

 @keyframes scaleIn{
    0% {
        transform: scale(0);
    }
    100% {
        transform: scale(1);
    }
 }

</style>
