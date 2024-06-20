# it-snooblk-Ansible
it'snooblk-Ansible


ansible-playbook playbooks/update_cloudflare_dns.yml -e "cloudflare_api_token=${{ secrets.CLOUDFLARE_API_TOKEN }} cloudflare_account_email=${{ secrets.CLOUDFLARE_ACCOUNT_EMAIL }} cloudflare_account_api_key=${{ secrets.CLOUDFLARE_ACCOUNT_API_KEY }}"

doc - https://docs.ansible.com/ansible/latest/collections/community/general/cloudflare_dns_module.html