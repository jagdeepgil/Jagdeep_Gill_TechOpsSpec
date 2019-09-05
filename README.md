# Jagdeep_Gill_TechOpsSpec

      
=> Application URL https://webappdemo.wwhnetwork.net/
 	      
   Note: Enabled foreign key on Name column, which will not allow duplication 


=> Trusted  your given SSH key on Ansible server 108.170.41.76. Now, you can access this server using passwordless authentication 


=> The SSH access of the Web Server and Database server has been secured to only IP “108.170.41.76” (Ansible server). If you
want to have access to these servers, then you need to login into “108.170.41.76” Ansible server.


=> The following things are automized using Playbook 
			o  Deployment of Servers and assigned Elastic IP address
			o  Secured access of Web and Database server using Security Group
			o  Apache installation and Hardening 
			o  SSL installation and auto redirection from HTTP to HTTPS
			o  Database installation and Hardening
			o  Web Data restoration 
			o  Create Database, user and password
			o  SQL Data restoration 
      o  The Web server is capable of Scaling Horizontally and Vertically


Note: The credentials and secret Keys are removed due to the security reason 



=> Deploy Web Server Instance

ansible-playbook -i /root/hosts /root/ServerProvisioning/ec2-websrvdeployment.yml --private-key=/root/SSHkeyCloudInfra/nodes.pem



=> Deploy MySQL Database server Instance

ansible-playbook -i /root/hosts /root/ServerProvisioning/ec2-databasesrvdeployment.yml --private-key=/root/SSHkeyCloudInfra/nodes.pem



=> Update Public IP address in Ansible Host file

Update the Elastic IP address of above servers in /root/hosts file

=> Update Private IP address of Database server 

Update the Private IP address of Database server under following file /var/www/html/config.php in Ansible Server

Note: the above file is located on Ansible server. 



=> Deploy Apache role and restore web content

ansible-playbook -i /root/hosts /root/RoleProvisioning/ec2-websrvApache-php.yml --private-key=/root/SSHkeyCloudInfra/nodes.pem


=> Deploy SSL Certificate and harden Apache

ansible-playbook -i /root/hosts /root/SSLProvisioning/ApacheVirtualConf.yml --private-key=/root/SSHkeyCloudInfra/nodes.pem


 

=> Deploy MySQL Role and harden MySQL

ansible-playbook -i /root/hosts /root/RoleProvisioning/ec2-datasrvMysql.yml --private-key=/root/SSHkeyCloudInfra/nodes.pem


=> Create MySQL DB, User & Password and Restore database backup

ansible-playbook -i /root/hosts /root/RoleProvisioning/ec2-DBcreationandRestoration.yml --private-key=/root/SSHkeyCloudInfra/nodes.pem


 
=> Login into Web Server from Ansible Server (108.170.41.76)

ssh -i /root/SSHkeyCloudInfra/nodes.pem ec2-user@13.59.63.118

sudo su -  



=> Login into Database Server from Ansible Server (108.170.41.76)

ssh -i /root/SSHkeyCloudInfra/nodes.pem ec2-user@18.191.113.192

sudo su -  



 



