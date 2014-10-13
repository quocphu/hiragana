select count(*)
from pattern
where title like '%#title#%'
or tag like '%#title#%'