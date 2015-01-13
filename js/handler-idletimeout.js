// http://stackoverflow.com/questions/667555/detecting-idle-time-in-javascript-elegantly
// http://forums.devshed.com/showpost.php?p=1965136&postcount=10
// reload browser after x minutes of inactivity
// kdg54 2013-09-03_Tue_09.51-AM

var t;
window.onload=resetTimer1;
document.onmousemove = resetTimer1;
document.onkeypress=resetTimer1;

function reload1()
{
	alert("Enough inactivity has been detected, the page will refresh.")
	location.reload();
}
function resetTimer1()
{
	clearTimeout(t);
	t=setTimeout(reload1,1000100) // 1800000 reloads browser in 30 minutes
}