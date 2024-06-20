install ansible
apt install ansible

install cloudflare collection 
ansible-galaxy collection install community.general

ansible-playbook playbooks/update_cloudflare_dns.yml

