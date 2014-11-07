select count(*)
from pattern
where status = 1
and (  title like '%#title#%'
or tag like '%#title#%')